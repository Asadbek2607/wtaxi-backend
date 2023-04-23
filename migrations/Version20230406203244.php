<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230406203244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'passenger table created';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE "passenger" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "name" VARCHAR(255) NOT NULL, 
            "email" VARCHAR(255) NOT NULL, 
            "phone_number" VARCHAR(255) NOT NULL, 
            "password" VARCHAR(255) NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            "updated_at" DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            "last_login_at" DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY("id")) 
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE "passenger"');
    }
}
