<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RideRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RideRepository::class)]
#[ApiResource]
class Ride
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pickupLocation = null;

    #[ORM\Column(length: 255)]
    private ?string $dropoffLocation = null;

    #[ORM\Column(length: 255)]
    private ?string $fare = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

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
}
