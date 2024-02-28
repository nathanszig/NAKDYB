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
    for ($i = 1; $i <= 5; $i++) {
      // create 5 fake place, Game, Npc, Character and News

      $game = new Game();
      $game->setName('Game '.$i);
      $game->setScenario('This is the story of a man name stanley. Stanlay the parable '.$i);
      $manager->persist($game);

      $news = new News();
      $news->setTitle('News '.$i);
      $news->setText('Text of news '.$i);
      $news->addGame($game);
      $manager->persist($news);

    }

    for ($i; $i <= 5; $i++) {

      switch ($i) {
        case 1:
          $placeName = 'Auberge du vent';
          $placeDescription = 'Une auberge où se retrouvent tous les voyageurs, guerrier et villageois';
          $npcName = 'Tristan le glorieux';
          $npcDescription = 'Ancien combatant qui combattait pendant les années de guerres il y a 40 ans';
          $monsterName = 'Dragon rouge';
          $monsterDescription = 'Un dragon rouge imposant de 300 kilos';
          $characterName = 'dylan';
          $characterDescription = 'Un nouveau chevalier peureux qui brave le danger';
          break;
        case 2:
          $placeName = 'Grotte des lombes';
          $placeDescription = 'Grotte qui sert de cimetière';
          $npcName = 'Igor';
          $npcDescription = 'Gardien de la grotte des lombes';
          $monsterName = 'Araignée géante';
          $monsterDescription = 'une araignée géante';
          $characterName = 'Natha';
          $characterDescription = 'Un ninja maitrisant des techniques de feu';
          break;
        case 3:
          $placeName = 'Bateau fantomes';
          $placeDescription = 'Un bateua qui navigue en mer...seul';
          $npcName = 'Bob';
          $npcDescription = 'Ancien capitaine du navire, il n apparait que la nuit';
          $monsterName = 'nessi';
          $monsterDescription = 'Un grand monstre marin';
          $characterName = 'Alexandre le grand';
          $characterDescription = 'Ancien roi déchus';
          break;
        case 4:
          $placeName = 'Hotel';
          $placeDescription = 'un hotel des plus étranges';
          $npcName = 'henri';
          $npcDescription = 'Un maitre d hotel francais très louche';
          $monsterName = 'Serpent';
          $monsterDescription = 'Un serpent furtif qui rampe';
          $characterName = 'theo';
          $characterDescription = 'Un ancien fermier a la recherche d aventure';
          break;
        case 5:
          $placeName = 'village';
          $placeDescription = 'centre du village';
          $npcName = 'richard';
          $npcDescription = 'vendeur a la sauvette';
          $monsterName = 'clown';
          $monsterDescription = 'un clown au grande dent';
          $characterName = 'karen';
          $characterDescription = 'une paysanne qui parti a la recherche d un tresor lointain';
          break;
        default:
          $placeName = 'village';
          $placeDescription = 'centre du village';
          $npcName = 'richard';
          $npcDescription = 'vendeur a la sauvette';
          $monsterName = 'clown';
          $monsterDescription = 'un clown au grande dent';
          $characterName = 'karen';
          $characterDescription = 'une paysanne qui parti a la recherche d un tresor lointain';
          break;
      }


      $place = new Place();
      $place->setName($placeName);
      $place->setDescription($placeDescription);
      $place->addGame($game);
      $manager->persist($place);

      $npc = new Npc();
      $npc->setName($npcName);
      $npc->setDescription($npcDescription);
      $npc->addPlace($place);
      $npc->addGame($game);
      $npc->setRole(['npc']);
      $npc->setPhysical(1);
      $npc->setMental(2);
      $npc->setSocial(3);
      $manager->persist($npc);

      $monster = new Monster();
      $monster->setName($monsterName);
      $monster->setDescription($monsterDescription);
      $monster->addPlace($place);
      $monster->addGame($game);
      $monster->setPhysical(1);
      $monster->setMental(2);
      $monster->setSocial(3);

      $manager->persist($monster);


      $character = new Character();
      $character->setName($characterName);
      $character->setRole($characterDescription);
      $character->setGame($game);
      $character->setPhysical(1);
      $character->setMental(2);
      $character->setSocial(3);
      $manager->persist($character);
    }
    $manager->flush();
  }
}
