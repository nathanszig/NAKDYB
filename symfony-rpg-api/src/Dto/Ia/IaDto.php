<?php

namespace App\Dto\Ia;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints\Type;

class IaDto
{
  #[Groups("ia")]
  #[SerializedName("messages")]
  #[Type("array<App\Dto\Ia\MessageDto>")]
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