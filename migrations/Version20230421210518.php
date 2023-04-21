<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230421210518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create driver table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE `driver` (
            `id` INT AUTO_INCREMENT NOT NULL, 
            `name` VARCHAR(255) NOT NULL, 
            `email` VARCHAR(255) NOT NULL, 
            `phone_number` VARCHAR(255) NOT NULL, 
            `license` VARCHAR(255) NOT NULL, 
            `vehicle` VARCHAR(255) NOT NULL, 
            `password` VARCHAR(255) NOT NULL, 
            `last_name` VARCHAR(255) NOT NULL, 
            `created_at` DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            `updated_at` DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            `last_login_at` DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `driver`');
    }
}
