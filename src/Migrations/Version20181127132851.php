<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181127132851 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE resevation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD nature_deplacement_id INT NOT NULL, ADD vehicule_id INT NOT NULL, ADD conduteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FCDADB35 FOREIGN KEY (nature_deplacement_id) REFERENCES nature_deplacement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554A4A3511 FOREIGN KEY (vehicule_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E43E10AD FOREIGN KEY (conduteur_id) REFERENCES conducteur (id)');
        $this->addSql('CREATE INDEX IDX_42C84955FCDADB35 ON reservation (nature_deplacement_id)');
        $this->addSql('CREATE INDEX IDX_42C849554A4A3511 ON reservation (vehicule_id)');
        $this->addSql('CREATE INDEX IDX_42C84955E43E10AD ON reservation (conduteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE resevation');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FCDADB35');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554A4A3511');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E43E10AD');
        $this->addSql('DROP INDEX IDX_42C84955FCDADB35 ON reservation');
        $this->addSql('DROP INDEX IDX_42C849554A4A3511 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955E43E10AD ON reservation');
        $this->addSql('ALTER TABLE reservation DROP nature_deplacement_id, DROP vehicule_id, DROP conduteur_id');
    }
}
