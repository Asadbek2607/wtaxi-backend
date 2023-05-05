<?php

declare(strict_types=1);

namespace App\Controller\Passenger;

use App\Entity\Passenger;
use App\Component\Passenger\PassengerManager;
use App\Component\Passenger\PassengerFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PassengerCreateAction extends AbstractController
{
    public function __construct(private PassengerFactory $passengerFactory, private PassengerManager $passengerManager)
    {
    }

    public function __invoke(Passenger $data):Passenger
    {
        $passenger = $this->passengerFactory->create($data->getEmail(), $data->getPassword());
        $this->passengerManager->save($passenger,true);
        return $passenger;

    }
}
