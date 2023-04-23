<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230421220345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create payment table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE "payment" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "method" VARCHAR(255) NOT NULL, 
            "amount" VARCHAR(255) NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id))
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE "payment"');
    }
}
