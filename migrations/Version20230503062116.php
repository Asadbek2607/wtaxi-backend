<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230503062116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ALL TABLES CREATED';
    }

    public function up(Schema $schema): void
    {
        // BOOKING TABLE
        $this->addSql(
            'CREATE TABLE "booking" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        // DRIVER TABLE
        $this->addSql(
            'CREATE TABLE "driver" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "vehicle_id" INT NOT NULL, 
            "first_name" VARCHAR(255) NOT NULL, 
            "email" VARCHAR(255) NOT NULL, 
            "phone_number" VARCHAR(255) NOT NULL, 
            "license" VARCHAR(255) NOT NULL, 
            "password" VARCHAR(255) NOT NULL, 
            "last_name" VARCHAR(255) NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            "updated_at" DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            "last_login_at" DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            UNIQUE INDEX UNIQ_11667CD9545317D1 (vehicle_id), 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        // PASSENGER TABLE
        $this->addSql(
            'CREATE TABLE "passenger" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "name" VARCHAR(255) NOT NULL, 
            "email" VARCHAR(255) NOT NULL, 
            "phone_number" VARCHAR(255) NOT NULL, 
            "password" VARCHAR(255) NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            "updated_at" DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            "last_login_at" DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        //PAYMENT TABLE
        $this->addSql(
            'CREATE TABLE "payment" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "method" VARCHAR(255) NOT NULL, 
            "amount" VARCHAR(255) NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        //REVIEW TABLE
        $this->addSql(
            'CREATE TABLE "review" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "rating" VARCHAR(255) NOT NULL, 
            "feedback" VARCHAR(255) DEFAULT NULL, 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        // RIDE TABLE
        $this->addSql(
            'CREATE TABLE "ride" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "passenger_id" INT NOT NULL, 
            "pickup_location" VARCHAR(255) NOT NULL, 
            "dropoff_location" VARCHAR(255) NOT NULL, 
            "fare" VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            INDEX IDX_9B3D7CD04502E565 (passenger_id),
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        // TRANSACTION TABLE
        $this->addSql(
            'CREATE TABLE "transaction" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "status" VARCHAR(255) NOT NULL, 
            "created_at" DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            "updated_at" DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        // VEHICLE TABLE
        $this->addSql(
            'CREATE TABLE "vehicle" (
            "id" INT AUTO_INCREMENT NOT NULL, 
            "make" VARCHAR(255) NOT NULL, 
            "model" VARCHAR(255) NOT NULL, 
            "color" VARCHAR(255) NOT NULL, 
            "number_of_seats" INT NOT NULL, 
            "license_plate_number" VARCHAR(255) NOT NULL, 
            year INT NOT NULL, status VARCHAR(255) NOT NULL, 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        // FOREIGN KEYS
        $this->addSql(
            'ALTER TABLE driver 
                            ADD CONSTRAINT FK_11667CD9545317D1 
                            FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)'
        );

        $this->addSql(
            'ALTER TABLE ride 
                            ADD CONSTRAINT FK_9B3D7CD04502E565 
                            FOREIGN KEY (passenger_id) REFERENCES passenger (id)'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE driver DROP FOREIGN KEY FK_11667CD9545317D1');
        $this->addSql('ALTER TABLE ride DROP FOREIGN KEY FK_9B3D7CD04502E565');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE driver');
        $this->addSql('DROP TABLE passenger');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE ride');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE vehicle');
    }
}
