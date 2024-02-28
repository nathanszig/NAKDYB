<?php

namespace App\Service;
use App\Dto\Ia\IaDto;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Symfony\Component\Serializer\SerializerInterface;

class IaService
{

  private SerializerInterface $serializer;
  public function __construct(SerializerInterface $serializer)
  {
    $this->serializer = $serializer;
  }

  /**
   * @throws Exception|GuzzleException
   */
  public function sendNewsToMistral(IaDto $iaDto): string
  {
    $url = 'http://localhost:1234/v1/chat/completions';
    $client = new Client();

  /*
    $requestOptions = [
      RequestOptions::BODY => $this->serializer->serialize($iaDto, 'json', ['groups' => 'ia']),
    ];*/


    /*$body = [
      'messages' => [
        ['role' => 'user', 'content' => 'Salut ça va ?'],
      ],
    ];*/

    dump($iaDto);




    try {
      /*$response = $client->post($url, $requestOptions);
      $responseContent = $response->getBody()->getContents();
      $responseDto = $this->serializer->deserialize($responseContent, IaDto::class, 'json');
      return $responseDto->getScenario();*/
      $response = $client->post($url, [
        'json' => $body, // Utilisez 'json' pour envoyer le corps en tant que JSON
      ]);
      $responseBody = $response->getBody()->getContents();
      $responseBody = json_decode($responseBody, true);
      $responseBody = $responseBody['choices'][0]['message']['content'];
      dump($responseBody);
      return $responseBody;

    } catch (Exception|BadResponseException $exception) {
      error_log('Exception caught: ' . $exception->getMessage());
      throw $exception;
    }
  }
}