<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230503130600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Review table relationships';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE review ADD passenger_id INT NOT NULL, ADD ride_id INT NOT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C64502E565 FOREIGN KEY (passenger_id) REFERENCES passenger (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6302A8A70 FOREIGN KEY (ride_id) REFERENCES ride (id)');
        $this->addSql('CREATE INDEX IDX_794381C64502E565 ON review (passenger_id)');
        $this->addSql('CREATE INDEX IDX_794381C6302A8A70 ON review (ride_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C64502E565');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6302A8A70');
        $this->addSql('DROP INDEX IDX_794381C64502E565 ON review');
        $this->addSql('DROP INDEX IDX_794381C6302A8A70 ON review');
        $this->addSql('ALTER TABLE review DROP passenger_id, DROP ride_id');
    }
}
