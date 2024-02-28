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

    // get the context and the message from the request

    if ($method === 'POST' && $game instanceof Game) {

        /* $news = $game->getNews();
        $newsTitle = $news->getTitle();
        $newsContent = $news->getText();
        $npcs = $game->getNpcs();
        $monsters = $game->getMonsters();
        $places = $game->getPlaces(); */

      /*   dump($newsTitle);
        dump($newsContent); */

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

        $userMessage = "Recent News Text: US President Joe Biden says he hopes to have a ceasefire in the war between Israel and Hamas in Gaza by Monday.

        His comments come amid reports of some progress in indirect negotiations involving Israeli and Hamas officials.

        It would involve aid deliveries to Gaza and the release of more hostages taken during the 7 October Hamas attacks.

        Israel has not commented and Hamas officials have indicated the two sides are not as close to a ceasefire deal as Mr Biden suggested.

        Qatar, which has been mediating in the talks alongside Egypt, said there was no deal to announce yet.

        The Qatari foreign ministry spokesman, Majed al-Ansari, said Doha was 'going to push for a pause before the beginning of Ramadan' and felt 'hopeful, not necessarily optimistic'.

        Israel launched a large-scale air and ground campaign in Gaza after Hamas gunmen killed about 1,200 people in southern Israel.

        The attackers also took 253 people hostage, a number of whom have since been released.

        The Hamas-run health ministry in the Gaza Strip says at least 29,878 people have been killed in the territory since then - including 96 deaths in the past 24 hours - in addition to 70,215 who have been wounded.

        According to Reuters news agency, quoting an unnamed source close to the talks, Hamas is still studying a draft framework, drawn by France, which would include a 40-day pause in all military operations and the exchange of Palestinians held in Israeli jails for Israeli hostages, at a ratio of 10 to one.

        Follow live: A day in the lives of Gazans as war nears five-month mark
        'Who will call me Dad?' Tears of Gaza father who lost 103 relatives
        Democrats brace for Gaza backlash in Michigan vote
        'We\'re close, President Biden told reporters in New York on Monday. 'We're not done yet. My hope is by next Monday we'll have a ceasefire.'

        On NBC's 'Late Night With Seth Meyers' which was broadcast later, the president said Israel would be willing to pause its assault during Ramadan if a deal was reached.

        The Islamic holy month begins around 10 March.

        'Ramadan's coming up and there has been an agreement by the Israelis that they would not engage in activities during Ramadan as well, in order to give us time to get all the hostages out,' Mr Biden said.

        On Tuesday, State Department spokesman Matthew Miller said that 'talks continue' but that 'ultimately, some of this comes down to Hamas' to agree.

        'We'd certainly welcome one by this weekend...we are trying to push this deal over the finish line,' Mr Miller added, although he declined to comment further on the negotiations or possible timing. 'We think it's possible.'

        However, a Hamas official told the BBC earlier: 'The priority for us in Hamas is not the exchange of detainees, but the cessation of the war.

        'It is not logical, after all this loss of life and property, to accept any offer that does not lead to a complete ceasefire, the return of the displaced, and the reconstruction of Gaza.'

        Last week, the US - Israel's main ally - was widely criticised for vetoing a UN Security Council resolution demanding an immediate ceasefire in Gaza. Instead, it proposed its own resolution for a temporary ceasefire 'as soon as practicable', which also warned Israel not to invade the southern Gazan city of Rafah 'under current circumstances'.

        Israel has faced mounting international pressure not to launch an offensive in Rafah, where about 1.5m Palestinians are sheltering, most having fled fighting further north in the territory.

        'There are too many innocent people that are being killed,' Mr Biden said on Late Night With Seth Meyers. 'And Israel has slowed down the attacks in Rafah. They have to. And they've made a commitment to me they're going to see to it that there is ability to evacuate significant portions of Rafah before they go and take out the remainder of Hamas.'

        On Sunday, the Israeli prime minister's office said it had received plans from its military to evacuate civilians from areas including Rafah.

        Mr Netanyahu said in an interview with CBS on Sunday that Israeli forces would eventually launch an invasion of Rafah regardless of any agreement for a temporary ceasefire, insisting: 'We can't leave the last Hamas stronghold without taking care of it.'

        'If we have a deal, it will be delayed somewhat,' he added. 'But it will happen. If we don\'t have a deal, we'll do it anyway.'

        In a separate development on Monday, Palestinian Authority (PA) Prime Minister Mohammed Shtayyeh resigned along with his government, which runs parts of the occupied West Bank.

        President Mahmoud Abbas accepted his decision, which could pave the way for a technocratic government.

        Mr Abbas is under pressure from the US to reform the PA so it can govern Gaza after the Israel-Hamas war ends.

        Last week, Mr Netanyahu presented a vision for the territory that made no mention of any role for the PA.

        Locations:  [
        {
        'name': 'The Neon Bazaar',
         'description': 'A bustling marketplace under neon lights, where information and illegal tech trade hands in shadows.'
        }
        {
         'name': 'The Ghost Market',
        'description': 'A clandestine market specializing in the trade of forbidden technology and supernatural artifacts.'
        }
        {
         'name': 'Global Security Summit',
         'description': 'An international conference held in a fortified hotel, where world leaders discuss covert security measures.'
        }
        ]

        NPCs:
        [
                    {
                        'name': 'Tara 'Neon' Singh',
                        'description': 'A charismatic hacker with a penchant for cybernetics, known as the queen of the bazaar.',
                        'physical': 4,
                        'mental': 9,
                        'social': 8
                    },
                    {
                        'name': 'Dex Larson',
                        'description': 'A former spy turned tech merchant, selling gadgets that are not always what they seem.',
                        'physical': 6,
                        'mental': 7,
                        'social': 7
                    },
                    {
                        'name': 'Viktor Morozov',
                        'description': 'A notorious arms dealer with a penchant for the occult, always surrounded by bodyguards.',
                        'physical': 7,
                        'mental': 6,
                        'social': 8
                    },
        ],

        Adversaries: [

                    {
                        'name': 'Spectral Assassin',
                        'description': 'Hired killers who've made pacts with dark forces, able to become invisible at will.',
                        'physical': 8,
                        'mental': 5,
                        'social': 2
                    },
                    {
                        'name': 'Curse Weaver',
                        'description': 'Dark sorcerers selling their services to the highest bidder, specializing in hexes and curses.',
                        'physical': 4,
                        'mental': 9,
                        'social': 3
                    },
                    {
                        'name': 'Neon Phantom',
                        'description': 'Elusive figures that blend into the neon lights, attacking when least expected.',
                        'physical': 7,
                        'mental': 6,
                        'social': 2
                    }
        ]";


        /*$iaDto = new IaDto([$context, $userMessage]);*/

        $scenario = $this->iaService->sendNewsToMistral($userMessage, $context);
        $game->setScenario($scenario);
    }


  }
}

