<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230809091125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE phone_balance (id INT AUTO_INCREMENT NOT NULL, phone_number_id INT NOT NULL, amount NUMERIC(10, 2) NOT NULL, UNIQUE INDEX UNIQ_3CB693CC39DFD528 (phone_number_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_number (id INT AUTO_INCREMENT NOT NULL, phone_user_id INT NOT NULL, operator_id INT NOT NULL, phone_number VARCHAR(7) NOT NULL, INDEX IDX_6B01BC5B372C5FA7 (phone_user_id), INDEX IDX_6B01BC5B584598A3 (operator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_operator (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE phone_balance ADD CONSTRAINT FK_3CB693CC39DFD528 FOREIGN KEY (phone_number_id) REFERENCES phone_number (id)');
        $this->addSql('ALTER TABLE phone_number ADD CONSTRAINT FK_6B01BC5B372C5FA7 FOREIGN KEY (phone_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE phone_number ADD CONSTRAINT FK_6B01BC5B584598A3 FOREIGN KEY (operator_id) REFERENCES phone_operator (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone_balance DROP FOREIGN KEY FK_3CB693CC39DFD528');
        $this->addSql('ALTER TABLE phone_number DROP FOREIGN KEY FK_6B01BC5B372C5FA7');
        $this->addSql('ALTER TABLE phone_number DROP FOREIGN KEY FK_6B01BC5B584598A3');
        $this->addSql('DROP TABLE phone_balance');
        $this->addSql('DROP TABLE phone_number');
        $this->addSql('DROP TABLE phone_operator');
        $this->addSql('DROP TABLE `user`');
    }
}
