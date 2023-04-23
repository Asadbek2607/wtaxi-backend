<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230421211857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create vehicle table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE "vehicle" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "make" VARCHAR(255) NOT NULL, 
            "model" VARCHAR(255) NOT NULL, 
            "color" VARCHAR(255) NOT NULL, 
            "number_of_seats" INT NOT NULL, 
            "license_plate_number" VARCHAR(255) NOT NULL, 
            "year" INT NOT NULL, status VARCHAR(255) NOT NULL, 
            PRIMARY KEY(id)) 
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE "vehicle"');
    }
}
