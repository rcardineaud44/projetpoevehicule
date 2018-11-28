<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128105707 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation ADD lieu_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('CREATE INDEX IDX_42C849556AB213CC ON reservation (lieu_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556AB213CC');
        $this->addSql('DROP INDEX IDX_42C849556AB213CC ON reservation');
        $this->addSql('ALTER TABLE reservation DROP lieu_id');
    }
}
