<?php

declare(strict_types=1);

namespace App\Component\Driver;

use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;

class DriverManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    // Save data temporarily and then save permanently

    public function save(Driver $driver, bool $isNeedFlush = false):void
    {
        $this->entityManager->persist($driver);

        if($isNeedFlush){
            $this->entityManager->flush();
        }
    }
}