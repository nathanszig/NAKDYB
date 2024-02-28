<?php

namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\Game;
use App\Entity\Monster;
use App\Entity\News;
use App\Entity\Npc;
use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
          // create 10 fake place, Game, Npc, Character and News

          $game = new Game();
          $game->setName('Game '.$i);
          $game->setScenario('Scenario of game '.$i);
          $manager->persist($game);

          $place = new Place();
          $place->setName('Place '.$i);
          $place->setDescription('Description of place '.$i);
          $place->addGame($game);
          $manager->persist($place);

          $npc = new Npc();
          $npc->setName('Npc '.$i);
          $npc->setDescription('Description of npc '.$i);
          $npc->addPlace($place);
          $npc->addGame($game);
          $npc->setRole(['role1', 'role2']);
          $npc->setPhysical(1);
          $npc->setMental(2);
          $npc->setSocial(3);
          $manager->persist($npc);

          $monster = new Monster();
          $monster->setName('Monster '.$i);
          $monster->setDescription('Description of monster '.$i);
          $monster->addPlace($place);
          $monster->addGame($game);
          $monster->setPhysical(1);
          $monster->setMental(2);
          $monster->setSocial(3);

          $manager->persist($monster);


          $character = new Character();
          $character->setName('Character '.$i);
          $character->setRole('Role '.$i);
          $character->setGame($game);
          $character->setPhysical(1);
          $character->setMental(2);
          $character->setSocial(3);
          $manager->persist($character);

          $news = new News();
          $news->setTitle('News '.$i);
          $news->setText('Text of news '.$i);
          $news->addGame($game);
          $manager->persist($news);

        }
        $manager->flush();
    }
}
