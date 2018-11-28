<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128080948 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation ADD litre_carburant NUMERIC(10, 2) DEFAULT NULL, ADD montant_carburant NUMERIC(10, 2) DEFAULT NULL, DROP litreCarburant, DROP montantCarburant, CHANGE kmparcourus km_parcourus INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation ADD litreCarburant NUMERIC(10, 2) DEFAULT NULL, ADD montantCarburant NUMERIC(10, 2) DEFAULT NULL, DROP litre_carburant, DROP montant_carburant, CHANGE km_parcourus kmParcourus INT NOT NULL');
    }
}
