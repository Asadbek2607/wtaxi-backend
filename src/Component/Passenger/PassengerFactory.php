<?php

declare(strict_types=1);

namespace App\Component\Passenger;

use App\Entity\Passenger;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PassengerFactory
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    // to create passenger object and encrypt password

    public function create(string $email, string $password): Passenger
    {
        $passenger = new Passenger();
        $passenger->setEmail($email);
        $hashedPassword = $this->passwordHasher->hashPassword($passenger,$password);
        $passenger->setPassword($hashedPassword);

        return $passenger;
    }
}
