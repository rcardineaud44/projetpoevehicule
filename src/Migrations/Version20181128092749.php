<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128092749 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reservation_conducteur (reservation_id INT NOT NULL, conducteur_id INT NOT NULL, INDEX IDX_43CDB8F7B83297E7 (reservation_id), INDEX IDX_43CDB8F7F16F4AC6 (conducteur_id), PRIMARY KEY(reservation_id, conducteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_conducteur ADD CONSTRAINT FK_43CDB8F7B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_conducteur ADD CONSTRAINT FK_43CDB8F7F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES conducteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556AB213CC');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E43E10AD');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FCDADB35');
        $this->addSql('DROP INDEX IDX_42C849556AB213CC ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955FCDADB35 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955E43E10AD ON reservation');
        $this->addSql('ALTER TABLE reservation ADD nature_id INT NOT NULL, ADD km_parcouru INT NOT NULL, DROP lieu_id, DROP nature_deplacement_id, DROP conduteur_id, DROP km_parcourus, CHANGE litre_carburant litre_carburant NUMERIC(3, 2) DEFAULT NULL, CHANGE montant_carburant montant_carburant NUMERIC(3, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849553BCB2E4B FOREIGN KEY (nature_id) REFERENCES nature_deplacement (id)');
        $this->addSql('CREATE INDEX IDX_42C849553BCB2E4B ON reservation (nature_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reservation_conducteur');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849553BCB2E4B');
        $this->addSql('DROP INDEX IDX_42C849553BCB2E4B ON reservation');
        $this->addSql('ALTER TABLE reservation ADD lieu_id INT NOT NULL, ADD nature_deplacement_id INT NOT NULL, ADD conduteur_id INT NOT NULL, ADD km_parcourus INT NOT NULL, DROP nature_id, DROP km_parcouru, CHANGE litre_carburant litre_carburant NUMERIC(10, 2) DEFAULT NULL, CHANGE montant_carburant montant_carburant NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E43E10AD FOREIGN KEY (conduteur_id) REFERENCES conducteur (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FCDADB35 FOREIGN KEY (nature_deplacement_id) REFERENCES nature_deplacement (id)');
        $this->addSql('CREATE INDEX IDX_42C849556AB213CC ON reservation (lieu_id)');
        $this->addSql('CREATE INDEX IDX_42C84955FCDADB35 ON reservation (nature_deplacement_id)');
        $this->addSql('CREATE INDEX IDX_42C84955E43E10AD ON reservation (conduteur_id)');
    }
}
