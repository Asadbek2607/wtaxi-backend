<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RideRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RideRepository::class)]
#[ApiResource(
    normalizationContext: ['groups'=>['ride:read']],
    denormalizationContext: ['groups'=>['ride:write']]
)]
class Ride
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['ride:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ride:read','ride:write'])]
    private ?string $pickupLocation = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ride:read','ride:write'])]
    private ?string $dropoffLocation = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ride:read','ride:write'])]
    private ?string $fare = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ride:read','ride:write'])]
    private ?string $status = null;

    #[ORM\Column]
    #[Groups(['ride:read','ride:write'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'rides')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['ride:read', 'ride:write'])]
    private ?Passenger $passenger = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPickupLocation(): ?string
    {
        return $this->pickupLocation;
    }

    public function setPickupLocation(string $pickupLocation): self
    {
        $this->pickupLocation = $pickupLocation;

        return $this;
    }

    public function getDropoffLocation(): ?string
    {
        return $this->dropoffLocation;
    }

    public function setDropoffLocation(string $dropoffLocation): self
    {
        $this->dropoffLocation = $dropoffLocation;

        return $this;
    }

    public function getFare(): ?string
    {
        return $this->fare;
    }

    public function setFare(string $fare): self
    {
        $this->fare = $fare;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPassenger(): ?Passenger
    {
        return $this->passenger;
    }

    public function setPassenger(?Passenger $passenger): self
    {
        $this->passenger = $passenger;

        return $this;
    }
}
