<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230503071740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Booking table relationships and some fields';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE booking 
                            ADD passenger_id INT NOT NULL, 
                            ADD ride_id INT NOT NULL, 
                            ADD vehicle_id INT NOT NULL, 
                            ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
                            ADD status VARCHAR(255) NOT NULL
                    ');
        $this->addSql('ALTER TABLE payment 
                            ADD booking_id INT NOT NULL');

        // foreign keys
        $this->addSql('ALTER TABLE booking 
                            ADD CONSTRAINT FK_E00CEDDE4502E565 
                            FOREIGN KEY (passenger_id) REFERENCES passenger (id)
                    ');

        $this->addSql('ALTER TABLE booking 
                            ADD CONSTRAINT FK_E00CEDDE302A8A70 
                            FOREIGN KEY (ride_id) REFERENCES ride (id)
                    ');

        $this->addSql('ALTER TABLE booking 
                            ADD CONSTRAINT FK_E00CEDDE545317D1 
                            FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)
                    ');
        
        $this->addSql('ALTER TABLE payment 
                            ADD CONSTRAINT FK_6D28840D3301C60 
                            FOREIGN KEY (booking_id) REFERENCES booking (id)');

        $this->addSql('CREATE INDEX IDX_E00CEDDE4502E565 ON booking (passenger_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE302A8A70 ON booking (ride_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE545317D1 ON booking (vehicle_id)');
        $this->addSql('CREATE INDEX IDX_6D28840D3301C60 ON payment (booking_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE4502E565');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE302A8A70');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE545317D1');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D3301C60');
        $this->addSql('ALTER TABLE booking DROP passenger_id, DROP ride_id, DROP vehicle_id, DROP updated_at, DROP status');
        $this->addSql('DROP INDEX IDX_E00CEDDE4502E565 ON booking');
        $this->addSql('DROP INDEX IDX_E00CEDDE302A8A70 ON booking');
        $this->addSql('DROP INDEX IDX_E00CEDDE545317D1 ON booking');
        $this->addSql('DROP INDEX IDX_6D28840D3301C60 ON payment');
        $this->addSql('ALTER TABLE payment DROP booking_id');
    }
}
