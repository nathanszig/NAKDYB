<?php

namespace App\Controller\Rest;

use App\Entity\Game;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class ApiGameController extends AbstractController
{
  public function __invoke(string $id): Response
  {
    return new Response('This game exist', 200);
  }
}