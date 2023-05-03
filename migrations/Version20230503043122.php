<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230503043122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relationship between vehicle and driver';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE vehicle ADD driver_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486C3423909 FOREIGN KEY (driver_id) REFERENCES `driver` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1B80E486C3423909 ON vehicle (driver_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486C3423909');
        $this->addSql('DROP INDEX UNIQ_1B80E486C3423909 ON vehicle');
        $this->addSql('ALTER TABLE vehicle DROP driver_id');
    }
}
