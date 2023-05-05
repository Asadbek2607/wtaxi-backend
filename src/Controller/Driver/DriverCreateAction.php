<?php

declare(strict_types=1);

namespace App\Controller\Driver;

use App\Entity\Driver;
use App\Component\Driver\DriverManager;
use App\Component\Driver\DriverFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DriverCreateAction extends AbstractController
{
    public function __construct(private DriverFactory $driverFactory, private DriverManager $driverManager)
    {
    }

    public function __invoke(Driver $data):Driver
    {
        $driver = $this->driverFactory->create($data->getEmail(), $data->getPassword());
        $this->driverManager->save($driver,true);
        return $driver;

    }
}
