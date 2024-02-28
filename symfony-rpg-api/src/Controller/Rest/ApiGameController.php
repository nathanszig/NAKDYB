<?php

namespace App\Controller\Rest;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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