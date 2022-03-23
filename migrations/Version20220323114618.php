<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323114618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation ADD client_id INT DEFAULT NULL, ADD photographe_id INT DEFAULT NULL, ADD type_prestations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD97DB59CB FOREIGN KEY (photographe_id) REFERENCES photographe (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADDD2A4499 FOREIGN KEY (type_prestations_id) REFERENCES type_prestation (id)');
        $this->addSql('CREATE INDEX IDX_51C88FAD19EB6921 ON prestation (client_id)');
        $this->addSql('CREATE INDEX IDX_51C88FAD97DB59CB ON prestation (photographe_id)');
        $this->addSql('CREATE INDEX IDX_51C88FADDD2A4499 ON prestation (type_prestations_id)');
        $this->addSql('ALTER TABLE tarif ADD photographe_id INT DEFAULT NULL, ADD type_prestations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C997DB59CB FOREIGN KEY (photographe_id) REFERENCES photographe (id)');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C9DD2A4499 FOREIGN KEY (type_prestations_id) REFERENCES type_prestation (id)');
        $this->addSql('CREATE INDEX IDX_E7189C997DB59CB ON tarif (photographe_id)');
        $this->addSql('CREATE INDEX IDX_E7189C9DD2A4499 ON tarif (type_prestations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD19EB6921');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD97DB59CB');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADDD2A4499');
        $this->addSql('DROP INDEX IDX_51C88FAD19EB6921 ON prestation');
        $this->addSql('DROP INDEX IDX_51C88FAD97DB59CB ON prestation');
        $this->addSql('DROP INDEX IDX_51C88FADDD2A4499 ON prestation');
        $this->addSql('ALTER TABLE prestation DROP client_id, DROP photographe_id, DROP type_prestations_id');
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C997DB59CB');
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C9DD2A4499');
        $this->addSql('DROP INDEX IDX_E7189C997DB59CB ON tarif');
        $this->addSql('DROP INDEX IDX_E7189C9DD2A4499 ON tarif');
        $this->addSql('ALTER TABLE tarif DROP photographe_id, DROP type_prestations_id');
    }
}
