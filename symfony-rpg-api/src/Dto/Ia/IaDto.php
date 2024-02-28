<?php

namespace App\Dto\Ia;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

class IaDto
{
  #[Groups("ia")]
  #[SerializedName("messages")]
  private array $messages;

  public function __construct(array $messages)
  {
    $this->messages = $messages;
  }

  public function getMessages(): array
  {
    return $this->messages;
  }

  public function setMessages(array $messages): self
  {
   $this->messages = $messages;
    return $this;
  }
}