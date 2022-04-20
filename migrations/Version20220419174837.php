<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419174837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE logo (id INT AUTO_INCREMENT NOT NULL, featured_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, svg LONGTEXT NOT NULL, color VARCHAR(255) DEFAULT NULL, INDEX IDX_E48E9A13306FF23 (featured_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE logo ADD CONSTRAINT FK_E48E9A13306FF23 FOREIGN KEY (featured_id) REFERENCES featured (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE logo');
    }
}
