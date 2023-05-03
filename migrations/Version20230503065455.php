<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230503065455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relationship between ride and driver';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ride ADD driver_id INT NOT NULL');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD0C3423909 FOREIGN KEY (driver_id) REFERENCES driver (id)');
        $this->addSql('CREATE INDEX IDX_9B3D7CD0C3423909 ON ride (driver_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ride DROP FOREIGN KEY FK_9B3D7CD0C3423909');
        $this->addSql('DROP INDEX IDX_9B3D7CD0C3423909 ON ride');
        $this->addSql('ALTER TABLE ride DROP driver_id');
    }
}
