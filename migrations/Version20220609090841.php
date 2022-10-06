<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609090841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livre_image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_image_livre (livre_image_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_691DE2E1516EC3C4 (livre_image_id), INDEX IDX_691DE2E137D925CB (livre_id), PRIMARY KEY(livre_image_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livre_image_livre ADD CONSTRAINT FK_691DE2E1516EC3C4 FOREIGN KEY (livre_image_id) REFERENCES livre_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_image_livre ADD CONSTRAINT FK_691DE2E137D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre_image_livre DROP FOREIGN KEY FK_691DE2E1516EC3C4');
        $this->addSql('DROP TABLE livre_image');
        $this->addSql('DROP TABLE livre_image_livre');
    }
}
