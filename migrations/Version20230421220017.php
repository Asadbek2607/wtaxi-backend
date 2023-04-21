<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230421220017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create review table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE `review` (
            `id` INT AUTO_INCREMENT NOT NULL, 
            `rating` VARCHAR(255) NOT NULL, 
            `feedback` VARCHAR(255) DEFAULT NULL, 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `review`');
    }
}
