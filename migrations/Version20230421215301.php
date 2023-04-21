<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230421215301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create ride table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE `ride` (
            `id` INT AUTO_INCREMENT NOT NULL, 
            `pickup_location` VARCHAR(255) NOT NULL, 
            `dropoff_location` VARCHAR(255) NOT NULL, 
            `fare` VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, 
            `created_at` DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `ride`');
    }
}
