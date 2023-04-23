<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230423030241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ride relation to passenger';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ride ADD passenger_id INT NOT NULL');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD04502E565 FOREIGN KEY (passenger_id) REFERENCES passenger (id)');
        $this->addSql('CREATE INDEX IDX_9B3D7CD04502E565 ON ride (passenger_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE ride DROP FOREIGN KEY FK_9B3D7CD04502E565');
        $this->addSql('DROP INDEX IDX_9B3D7CD04502E565 ON ride');
        $this->addSql('ALTER TABLE ride DROP passenger_id');
    }
}
