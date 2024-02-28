<?php

namespace App\Dto\Ia;

use Symfony\Component\Serializer\Annotation\Groups;

class MessageDto
{
  #[Groups('ia')]
  private string $role;

  #[Groups('ia')]
  private string $content;

  public function __construct(string $role, string $content)
  {
    $this->content = $content;
    $this->role = $role;
  }

  public function getRole(): string
  {
    return $this->role;
  }

  public function setRole(string $role): MessageDto
  {
    $this->role = $role;
    return $this;
  }

  public function getContent(): string
  {
    return $this->content;
  }

  public function setContent(string $content): MessageDto
  {
    $this->content = $content;
    return $this;
  }
}