<?php

declare(strict_types=1);

namespace App\Component\Driver;

use App\Entity\Driver;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DriverFactory
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    // to create passenger object and encrypt password

    public function create(string $email, string $password): Driver
    {
        $driver = new Driver();
        $driver->setEmail($email);
        $hashedPassword = $this->passwordHasher->hashPassword($driver,$password);
        $driver->setPassword($hashedPassword);

        return $driver;
    }
}
