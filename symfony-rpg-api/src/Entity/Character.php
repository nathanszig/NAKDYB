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
    private int $id;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column]
    private ?int $physical = null;

    #[ORM\Column]
    private ?int $mental = null;

    #[ORM\Column]
    private ?int $social = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?Game $game = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getPhysical(): ?int
    {
        return $this->physical;
    }

    public function setPhysical(int $physical): static
    {
        $this->physical = $physical;

        return $this;
    }

    public function getMental(): ?int
    {
        return $this->mental;
    }

    public function setMental(int $mental): static
    {
        $this->mental = $mental;

        return $this;
    }

    public function getSocial(): ?int
    {
        return $this->social;
    }

    public function setSocial(int $social): static
    {
        $this->social = $social;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }
}
