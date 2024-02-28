<?php
// src/EventSubscriber/GameSubscriber.php
namespace App\EventSubscriber;

use App\Dto\Ia\IaDto;
use App\Dto\Ia\MessageDto;
use App\Entity\Game;
use App\Service\IaService;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Symfony\EventListener\EventPriorities;


class GameSubscriber implements EventSubscriberInterface
{

  private IaService $iaService;

  private LoggerInterface $logger;
  public function __construct(
    IaService $iaService,
    LoggerInterface $logger
  ) {
    $this->iaService = $iaService;
    $this->logger = $logger;
  }

  public static function getSubscribedEvents(): array
  {
    return [
      KernelEvents::VIEW => ['sendNewsToMistral', EventPriorities::PRE_WRITE],
    ];
  }

  public function sendNewsToMistral(ViewEvent $event): void
  {

    // #TODO : Récuperer les variables en paramètre pour le contexte et le message   
    $game = $event->getControllerResult();
    $method = $event->getRequest()->getMethod();

    var_dump($game instanceof Game);
    var_dump($method === 'POST');

    if ($method === 'POST' && $game instanceof Game) {
        $context = new MessageDto('system', 'toto');
        $userMessage = new MessageDto('user', 'salut ça va ?');
        $iaDto = new IaDto([$context, $userMessage]);
        $scenario = $this->iaService->sendNewsToMistral($iaDto);
        $game->setScenario($scenario);
    }


  }
}

