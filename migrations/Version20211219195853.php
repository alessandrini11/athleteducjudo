<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219195853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecole (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, couleur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_595AAE34C31BA576 (couleur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sexe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE34C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE athlete ADD sexe_id INT DEFAULT NULL, ADD ecole_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B8321448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B832177EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecole (id)');
        $this->addSql('CREATE INDEX IDX_C03B8321448F3B3C ON athlete (sexe_id)');
        $this->addSql('CREATE INDEX IDX_C03B832177EF1B1E ON athlete (ecole_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grade DROP FOREIGN KEY FK_595AAE34C31BA576');
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B832177EF1B1E');
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B8321448F3B3C');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE ecole');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE sexe');
        $this->addSql('DROP INDEX IDX_C03B8321448F3B3C ON athlete');
        $this->addSql('DROP INDEX IDX_C03B832177EF1B1E ON athlete');
        $this->addSql('ALTER TABLE athlete DROP sexe_id, DROP ecole_id');
    }
}
