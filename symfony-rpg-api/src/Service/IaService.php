<?php

namespace App\Service;
use App\Dto\Ia\IaDto;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class IaService
{

  private SerializerInterface $serializer;

  private LoggerInterface $logger;

  public function __construct(SerializerInterface $serializer, LoggerInterface $logger)
  {
    $this->serializer = $serializer;
    $this->logger = $logger;
  }

  /**
   * @throws Exception|GuzzleException
   */
  public function sendNewsToMistral($userMessage, $context): string
  {
    $url = 'http://localhost:1234/v1/chat/completions';
    $client = new Client();

/*
    $requestOptions = [
      RequestOptions::BODY => $this->serializer->serialize($iaDto, 'json', ['groups' => 'ia']),
    ];

*/


    $body = [
      'messages' => [
        ['role' => 'user', 'content' => $userMessage],
        ['role' => 'system', 'content' => $context],
      ],
    ];

    try {
      $response = $client->post($url,[
        'json' =>  $body
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