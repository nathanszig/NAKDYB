<?php

namespace App\Command;

use App\Dto\WorldNewsDto;
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'app:get-news',
    description: 'Add a short description for your command',
)]
class GetNewsCommand extends Command
{
  private $entityManager;

  private SerializerInterface $serializer;
  private $apiUrl = 'https://api.worldnewsapi.com/search-news?language=en&api-key=df7cc7d6c04841f9a34e01247bd7645b&sort=publish-time&sort-direction=DESC&number=5';

    public function __construct(
      EntityManagerInterface $entityManager,
      SerializerInterface$serializer
    ) {
        parent::__construct();

      $this->entityManager = $entityManager;
      $this->serializer = $serializer;
    }

    protected function configure(): void
    {
      $this->setName('app:get-news')
        ->setDescription('Fetch news from the API and persist in the database');
    }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $client = new Client();
    $response = $client->get($this->apiUrl);
    $apiData = json_decode($response->getBody());

    foreach ($apiData->news as $apiNews) {
      $news = new News();
      $news->setTitle($apiNews->title);
      $news->setText($apiNews->text);

      // Vous pouvez également définir d'autres champs ici, comme la date de publication, l'auteur, etc.

      $this->entityManager->persist($news);
    }

    $this->entityManager->flush();

    $output->writeln('News imported successfully.');

    return Command::SUCCESS;
  }
}
