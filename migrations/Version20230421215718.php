<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230421215718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create booking table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE "booking" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id))
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE "booking"');
    }
}
