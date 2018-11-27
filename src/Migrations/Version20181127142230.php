<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181127142230 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE conducteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nature_deplacement (id INT AUTO_INCREMENT NOT NULL, nature VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, lieu_id INT NOT NULL, nature_deplacement_id INT NOT NULL, vehicule_id INT NOT NULL, conduteur_id INT NOT NULL, date DATETIME NOT NULL, litre_carburant NUMERIC(10, 2) NOT NULL, montant_carburant NUMERIC(10, 2) DEFAULT NULL, km_parcourus INT NOT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_42C849556AB213CC (lieu_id), INDEX IDX_42C84955FCDADB35 (nature_deplacement_id), INDEX IDX_42C849554A4A3511 (vehicule_id), INDEX IDX_42C84955E43E10AD (conduteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FCDADB35 FOREIGN KEY (nature_deplacement_id) REFERENCES nature_deplacement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554A4A3511 FOREIGN KEY (vehicule_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E43E10AD FOREIGN KEY (conduteur_id) REFERENCES conducteur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E43E10AD');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FCDADB35');
        $this->addSql('DROP TABLE conducteur');
        $this->addSql('DROP TABLE nature_deplacement');
        $this->addSql('DROP TABLE reservation');
    }
}
