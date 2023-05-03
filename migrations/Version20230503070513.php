<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230503070513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relationship between ride and vehicle';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ride ADD vehicle_id INT NOT NULL');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD0545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('CREATE INDEX IDX_9B3D7CD0545317D1 ON ride (vehicle_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ride DROP FOREIGN KEY FK_9B3D7CD0545317D1');
        $this->addSql('DROP INDEX IDX_9B3D7CD0545317D1 ON ride');
        $this->addSql('ALTER TABLE ride DROP vehicle_id');
    }
}
