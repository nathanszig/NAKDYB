<?php
// src/EventSubscriber/GameSubscriber.php
namespace App\EventSubscriber;

use App\Dto\Ia\IaDto;
use App\Dto\Ia\MessageDto;
use App\Entity\Game;
use App\Service\IaService;
use GuzzleHttp\Exception\GuzzleException;
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
      KernelEvents::VIEW => ['sendNewsToMistral', EventPriorities::POST_WRITE],
    ];
  }

  /**
   * @throws GuzzleException
   */
  public function sendNewsToMistral(ViewEvent $event): void
  {
    $game = $event->getControllerResult();
    $method = $event->getRequest()->getMethod();

    if ($method === 'PATCH' && $game instanceof Game && is_null($game->getScenario())) {

        $news = $game->getNews();
        $newsContent = $news->getText();

        $npcs = $game->getNpcs();
        $npcs = $npcs->toArray();
        $monsters = $game->getMonsters();
        $monsters = $monsters->toArray();
        $places = $game->getPlaces();
        $places = $places->toArray();

        $npcString = "";
        for($i = 0; $i < count($npcs); $i++){
            $npcString .= "{
                'name': '".$npcs[$i]->getName()."',
                'description': '".$npcs[$i]->getDescription()."',
            } \n";
        }

       $monsterString = "";
        for($i = 0; $i < count($monsters); $i++){
            $monsterString .= "{
                'name': '".$monsters[$i]->getName()."',
                'description': '".$monsters[$i]->getDescription()."',
            } \n";
        }

        $placeString = "";
        for($i = 0; $i < count($places); $i++){
          $placeString .= "{
                  'name': '".$places[$i]->getName()."',
                  'description': '".$places[$i]->getDescription()."',
              } \n";
        }


        $context = "Model Objective: Transform recent news into immersive modern espionage RPG scenarios. These scenarios should integrate narrative elements, settings, non-player characters (NPCs), and adversaries, drawing from the original news content. The ambiance is inspired by modern spy thrillers like James Bond, Mission Impossible, Agents of SHIELD, Person of Interest, FUBAR, and True Lies, with a focus on delivering experiences across four distinct types of scenarios: Action, Investigation, Infiltration, and Traitor.

        Input Requirements:
        
        Recent News Text: A summary or a full article about a recent event or discovery. This can range from scientific breakthroughs to significant political events, tailored to inspire a modern espionage theme.
        
        Locations: A list of three specific locations where the scenario will unfold. These settings can be realistic or fictional, fitting the espionage theme.
        
        NPCs: Three NPCs that players might encounter, including allies, informants, or enemies. Provide a brief description of their role, personality, and any objectives or secrets they might hold.
        
        Adversaries: Three types of adversaries or challenges players might face, including enemy spies, security systems, or rival agencies. Include descriptions of their appearance, behavior, and weaknesses.
        
        Scenario Types:
        
        Action (Expendables-style): Scenarios focused on high-energy, combat-heavy missions where players must 'go in guns blazing' to achieve their objectives.
        
        Investigation (Detective Work): Scenarios requiring players to uncover clues, interrogate NPCs, and solve puzzles to determine who is behind the events inspired by the news.
        
        Infiltration (Stealth Required): Scenarios where players must avoid detection, utilizing stealth and cunning to navigate through heavily guarded areas or to gather intelligence without being caught.
        
        Traitor (Ally Turns Foe): Scenarios involving a twist where an ally turns out to be a traitor, requiring players to identify and confront the betrayal within their ranks.
        
        Model Features:
        
        Plot Generation: Craft a coherent storyline that fits into the espionage RPG universe, starting with an engaging introduction, developing a central conflict, and offering a resolution that allows for future adventures.
        
        Role of the GM: Transform traditional GM narrations into interventions by an omniscient AI, including environment descriptions, NPC interactions, combat scenarios, and plot progression.
        
        Adaptability: The model should adapt to various RPG genres, whether fantasy, futuristic, historical, etc., based on the inputs and setting provided by the user.
        
        Interactivity: Include interactive elements like player choices, puzzles, moral decisions affecting the story's progression, and tailored challenges based on the scenario type.
        
        Output:
        
        A complete RPG scenario, including:
        
        Introduction: Presenting the recent news transformed into the game's context.
        Development: Descriptions of settings, NPC encounters, confrontations with adversaries, and plot advancement based on the provided elements and chosen scenario type.
        Conclusion: An open ending that connects the adventure to future gaming sessions.
        Appendices: Detailed descriptions of NPCs, adversaries, and locations, along with suggestions for specific rules or gameplay mechanics unique to the scenario.";

        $userMessage = " Recent News Text: " . $newsContent ." Locations:  ". $placeString ."
        NPCs: " . $npcString ."
        Adversaries: " . $monsterString . "";


        /*$iaDto = new IaDto([$context, $userMessage]);*/

        $scenario = $this->iaService->sendNewsToMistral($userMessage, $context);
        $game->setScenario($scenario);
    }


  }
}

