<?php

declare(strict_types=1);

namespace App\Component\Passenger;

use App\Entity\Passenger;
use Doctrine\ORM\EntityManagerInterface;

class PassengerManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    // Save data temporarily and then save permanently

    public function save(Passenger $passenger, bool $isNeedFlush = false):void
    {
        $this->entityManager->persist($passenger);

        if($isNeedFlush){
            $this->entityManager->flush();
        }
    }
}