<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201118085827 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, annee SMALLINT NOT NULL, prix DOUBLE PRECISION NOT NULL, visuel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE EXPOSITION (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, lieu VARCHAR(20) NOT NULL, adresse VARCHAR(50) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, date_vernissage DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre_EXPOSEE (id_exposition INT(5), id_photo INT(11), prix INT(6), PRIMARY KEY(id_photo, id_exposition), FOREIGN KEY (id_photo) REFERENCES photo(id), FOREIGN KEY (id_exposition) REFERENCES EXPOSITION(id)) ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE EXPOSITION');
        $this->addSql('DROP TABLE oeuvre_EXPOSEE');
        $this->addSql('DROP TABLE admin');
        $this->addSql('ALTER TABLE oeuvre_exposee DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE oeuvre_exposee ADD CONSTRAINT oeuvre_exposee_ibfk_1 FOREIGN KEY (id_photo) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE oeuvre_exposee ADD CONSTRAINT oeuvre_exposee_ibfk_2 FOREIGN KEY (id_exposition) REFERENCES exposition (id)');
        $this->addSql('CREATE INDEX id_exposition ON oeuvre_exposee (id_exposition)');
        $this->addSql('CREATE INDEX IDX_D93026DFA32C528 ON oeuvre_exposee (id_photo)');
        $this->addSql('ALTER TABLE oeuvre_exposee ADD PRIMARY KEY (id_photo, id_exposition)');
    }
}
