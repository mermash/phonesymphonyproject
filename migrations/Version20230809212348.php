<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230809212348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone_balance DROP FOREIGN KEY FK_3CB693CC39DFD528');
        $this->addSql('DROP TABLE phone_balance');
        $this->addSql('ALTER TABLE phone_number ADD balance DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE phone_balance (id INT AUTO_INCREMENT NOT NULL, phone_number_id INT NOT NULL, amount NUMERIC(10, 2) NOT NULL, UNIQUE INDEX UNIQ_3CB693CC39DFD528 (phone_number_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE phone_balance ADD CONSTRAINT FK_3CB693CC39DFD528 FOREIGN KEY (phone_number_id) REFERENCES phone_number (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE phone_number DROP balance');
    }
}
