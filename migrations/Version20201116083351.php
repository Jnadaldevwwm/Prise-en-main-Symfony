<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201116083351 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE oeuvre_EXPOSEE');
        $this->addSql('ALTER TABLE EXPOSITION ADD date_debut DATE NOT NULL, ADD date_fin DATE NOT NULL, DROP dateDebut, DROP dateFin, CHANGE datevernissage date_vernissage DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oeuvre_EXPOSEE (id_exposition INT NOT NULL, id_photo INT NOT NULL, prix INT NOT NULL, INDEX id_exposition (id_exposition), INDEX IDX_32D6FC77FA32C528 (id_photo), PRIMARY KEY(id_photo, id_exposition)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE oeuvre_EXPOSEE ADD CONSTRAINT oeuvre_exposee_ibfk_1 FOREIGN KEY (id_photo) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE oeuvre_EXPOSEE ADD CONSTRAINT oeuvre_exposee_ibfk_2 FOREIGN KEY (id_exposition) REFERENCES exposition (id)');
        $this->addSql('ALTER TABLE exposition ADD dateDebut DATE NOT NULL, ADD dateFin DATE NOT NULL, DROP date_debut, DROP date_fin, CHANGE date_vernissage dateVernissage DATETIME NOT NULL');
    }
}
