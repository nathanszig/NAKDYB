<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\NpcRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NpcRepository::class)]
#[ApiResource(stateless: false)]
class Npc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(type: Types::TEXT)]
    private string $description;

    #[ORM\Column]
    private array $role = [];

    #[ORM\Column]
    private int $physical;

    #[ORM\Column]
    private int $mental;

    #[ORM\Column]
    private int $social;

    #[ORM\ManyToMany(targetEntity: Game::class, mappedBy: 'npcs')]
    private Collection $games;

    #[ORM\ManyToMany(targetEntity: Place::class, inversedBy: 'npcs')]
    private Collection $places;

    public function __construct()
    {
        $this->games = new ArrayCollection();
        $this->places = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getRole(): array
    {
        return $this->role;
    }

    public function setRole(array $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getPhysical(): int
    {
        return $this->physical;
    }

    public function setPhysical(int $physical): static
    {
        $this->physical = $physical;

        return $this;
    }

    public function getMental(): int
    {
        return $this->mental;
    }

    public function setMental(int $mental): static
    {
        $this->mental = $mental;

        return $this;
    }

    public function getSocial(): int
    {
        return $this->social;
    }

    public function setSocial(int $social): static
    {
        $this->social = $social;

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): static
    {
        if (!$this->games->contains($game)) {
            $this->games->add($game);
            $game->addNpc($this);
        }

        return $this;
    }

    public function removeGame(Game $game): static
    {
        if ($this->games->removeElement($game)) {
            $game->removeNpc($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): static
    {
        if (!$this->places->contains($place)) {
            $this->places->add($place);
        }

        return $this;
    }

    public function removePlace(Place $place): static
    {
        $this->places->removeElement($place);

        return $this;
    }
}
