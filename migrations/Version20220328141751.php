<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220328141751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, photographe_id INT DEFAULT NULL, type_prestations_id INT DEFAULT NULL, date_prestation DATETIME NOT NULL, heure TIME NOT NULL, nombre_heure INT NOT NULL, rue VARCHAR(255) NOT NULL, rue_prestation VARCHAR(255) NOT NULL, numero_rue_prestation VARCHAR(10) NOT NULL, code_postal_prestation VARCHAR(10) NOT NULL, total INT NOT NULL, INDEX IDX_51C88FAD19EB6921 (client_id), INDEX IDX_51C88FAD97DB59CB (photographe_id), INDEX IDX_51C88FADDD2A4499 (type_prestations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, photographe_id INT DEFAULT NULL, type_prestations_id INT DEFAULT NULL, prix_par_heure INT NOT NULL, prix_par_jour INT NOT NULL, INDEX IDX_E7189C997DB59CB (photographe_id), INDEX IDX_E7189C9DD2A4499 (type_prestations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prestation (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, discr VARCHAR(255) NOT NULL, rue VARCHAR(255) DEFAULT NULL, numero VARCHAR(255) DEFAULT NULL, tva VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD97DB59CB FOREIGN KEY (photographe_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADDD2A4499 FOREIGN KEY (type_prestations_id) REFERENCES type_prestation (id)');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C997DB59CB FOREIGN KEY (photographe_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C9DD2A4499 FOREIGN KEY (type_prestations_id) REFERENCES type_prestation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADDD2A4499');
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C9DD2A4499');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD19EB6921');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD97DB59CB');
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C997DB59CB');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE type_prestation');
        $this->addSql('DROP TABLE user');
    }
}
