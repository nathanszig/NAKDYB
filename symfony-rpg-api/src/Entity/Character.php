<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
#[ApiResource(stateless: false)]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Role = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $GameId = null;

    #[ORM\Column]
    private ?int $Physical = null;

    #[ORM\Column]
    private ?int $Mental = null;

    #[ORM\Column]
    private ?int $Social = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->Role;
    }

    public function setRole(string $Role): static
    {
        $this->Role = $Role;

        return $this;
    }

    public function getGameId(): ?Game
    {
        return $this->GameId;
    }

    public function setGameId(?Game $GameId): static
    {
        $this->GameId = $GameId;

        return $this;
    }

    public function __toString(): string
    {
        return $this->Name;
    }

    public function getPhysical(): ?int
    {
        return $this->Physical;
    }

    public function setPhysical(int $Physical): static
    {
        $this->Physical = $Physical;

        return $this;
    }

    public function getMental(): ?int
    {
        return $this->Mental;
    }

    public function setMental(int $Mental): static
    {
        $this->Mental = $Mental;

        return $this;
    }

    public function getSocial(): ?int
    {
        return $this->Social;
    }

    public function setSocial(int $Social): static
    {
        $this->Social = $Social;

        return $this;
    }
}
