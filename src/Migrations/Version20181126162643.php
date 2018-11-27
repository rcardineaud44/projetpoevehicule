<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126162643 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, lieu VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_carburant (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, type_carburant_id INT NOT NULL, lieu_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, kilometrage INT NOT NULL, INDEX IDX_E9E2810FB5991721 (type_carburant_id), INDEX IDX_E9E2810F6AB213CC (lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FB5991721 FOREIGN KEY (type_carburant_id) REFERENCES type_carburant (id)');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F6AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F6AB213CC');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FB5991721');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE type_carburant');
        $this->addSql('DROP TABLE voiture');
    }
}
