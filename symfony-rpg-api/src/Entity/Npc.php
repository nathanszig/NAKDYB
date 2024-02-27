<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\NpcRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NpcRepository::class)]
#[ApiResource]
class Npc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\ManyToMany(targetEntity: Place::class, inversedBy: 'npcs')]
    private Collection $PlaceId;

    #[ORM\Column]
    private array $Role = [];

    public function __construct()
    {
        $this->PlaceId = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaceId(): Collection
    {
        return $this->PlaceId;
    }

    public function addPlaceId(Place $placeId): static
    {
        if (!$this->PlaceId->contains($placeId)) {
            $this->PlaceId->add($placeId);
        }

        return $this;
    }

    public function removePlaceId(Place $placeId): static
    {
        $this->PlaceId->removeElement($placeId);

        return $this;
    }

    public function getRole(): array
    {
        return $this->Role;
    }

    public function setRole(array $Role): static
    {
        $this->Role = $Role;

        return $this;
    }
}