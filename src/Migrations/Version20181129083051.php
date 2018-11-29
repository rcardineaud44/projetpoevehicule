<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181129083051 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, nature_id INT NOT NULL, vehicule_id INT NOT NULL, lieu_id INT NOT NULL, conducteur_id INT NOT NULL, litre_carburant NUMERIC(10, 2) DEFAULT NULL, montant_carburant NUMERIC(10, 2) DEFAULT NULL, km_parcouru INT NOT NULL, destination VARCHAR(255) NOT NULL, commentaire LONGTEXT DEFAULT NULL, date_utilisation DATETIME NOT NULL, INDEX IDX_42C849553BCB2E4B (nature_id), INDEX IDX_42C849554A4A3511 (vehicule_id), INDEX IDX_42C849556AB213CC (lieu_id), INDEX IDX_42C84955F16F4AC6 (conducteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849553BCB2E4B FOREIGN KEY (nature_id) REFERENCES nature_deplacement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554A4A3511 FOREIGN KEY (vehicule_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES conducteur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reservation');
    }
}
