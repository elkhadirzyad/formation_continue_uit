<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190114095102 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D62195E0F0');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D62195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE6482195E0F0');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE6482195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE6482195E0F0');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE6482195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D62195E0F0');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D62195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
    }
}
