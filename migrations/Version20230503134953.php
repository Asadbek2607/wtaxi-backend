<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230503134953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relationship between transaction and payment';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE transaction ADD payment_id INT NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D14C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_723705D14C3A3BB ON transaction (payment_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D14C3A3BB');
        $this->addSql('DROP INDEX UNIQ_723705D14C3A3BB ON transaction');
        $this->addSql('ALTER TABLE transaction DROP payment_id');
    }
}
