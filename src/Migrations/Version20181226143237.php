<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181226143237 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE6484AEED04E');
        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE6486EA32074');
        $this->addSql('DROP INDEX IDX_1DAAE6484AEED04E ON licence');
        $this->addSql('DROP INDEX IDX_1DAAE6486EA32074 ON licence');
        $this->addSql('ALTER TABLE licence ADD specialite_id INT DEFAULT NULL, ADD responsable_id INT DEFAULT NULL, DROP id_s_id, DROP id_responsable_id');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE6482195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE64853C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_1DAAE6482195E0F0 ON licence (specialite_id)');
        $this->addSql('CREATE INDEX IDX_1DAAE64853C59D72 ON licence (responsable_id)');
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D64AEED04E');
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D66EA32074');
        $this->addSql('DROP INDEX IDX_2D09A3D64AEED04E ON master');
        $this->addSql('DROP INDEX IDX_2D09A3D66EA32074 ON master');
        $this->addSql('ALTER TABLE master ADD specialite_id INT DEFAULT NULL, ADD responsable_id INT DEFAULT NULL, DROP id_s_id, DROP id_responsable_id');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D62195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D653C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_2D09A3D62195E0F0 ON master (specialite_id)');
        $this->addSql('CREATE INDEX IDX_2D09A3D653C59D72 ON master (responsable_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE6482195E0F0');
        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE64853C59D72');
        $this->addSql('DROP INDEX IDX_1DAAE6482195E0F0 ON licence');
        $this->addSql('DROP INDEX IDX_1DAAE64853C59D72 ON licence');
        $this->addSql('ALTER TABLE licence ADD id_s_id INT DEFAULT NULL, ADD id_responsable_id INT DEFAULT NULL, DROP specialite_id, DROP responsable_id');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE6484AEED04E FOREIGN KEY (id_s_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE6486EA32074 FOREIGN KEY (id_responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_1DAAE6484AEED04E ON licence (id_s_id)');
        $this->addSql('CREATE INDEX IDX_1DAAE6486EA32074 ON licence (id_responsable_id)');
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D62195E0F0');
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D653C59D72');
        $this->addSql('DROP INDEX IDX_2D09A3D62195E0F0 ON master');
        $this->addSql('DROP INDEX IDX_2D09A3D653C59D72 ON master');
        $this->addSql('ALTER TABLE master ADD id_s_id INT DEFAULT NULL, ADD id_responsable_id INT DEFAULT NULL, DROP specialite_id, DROP responsable_id');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D64AEED04E FOREIGN KEY (id_s_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D66EA32074 FOREIGN KEY (id_responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_2D09A3D64AEED04E ON master (id_s_id)');
        $this->addSql('CREATE INDEX IDX_2D09A3D66EA32074 ON master (id_responsable_id)');
    }
}
