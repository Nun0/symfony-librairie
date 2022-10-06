<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613074318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carousel (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, texte LONGTEXT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, texte LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_carousel (home_id INT NOT NULL, carousel_id INT NOT NULL, INDEX IDX_78D2BE0D28CDC89C (home_id), INDEX IDX_78D2BE0DC1CE5B98 (carousel_id), PRIMARY KEY(home_id, carousel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE home_carousel ADD CONSTRAINT FK_78D2BE0D28CDC89C FOREIGN KEY (home_id) REFERENCES home (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE home_carousel ADD CONSTRAINT FK_78D2BE0DC1CE5B98 FOREIGN KEY (carousel_id) REFERENCES carousel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD adresse VARCHAR(255) DEFAULT NULL, ADD code_postal INT DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD pays VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home_carousel DROP FOREIGN KEY FK_78D2BE0DC1CE5B98');
        $this->addSql('ALTER TABLE home_carousel DROP FOREIGN KEY FK_78D2BE0D28CDC89C');
        $this->addSql('DROP TABLE carousel');
        $this->addSql('DROP TABLE home');
        $this->addSql('DROP TABLE home_carousel');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP adresse, DROP code_postal, DROP ville, DROP pays');
    }
}
