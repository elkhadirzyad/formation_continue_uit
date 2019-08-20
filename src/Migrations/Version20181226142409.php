<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181226142409 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE licence (id INT AUTO_INCREMENT NOT NULL, id_s_id INT DEFAULT NULL, id_responsable_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, etablissement VARCHAR(255) NOT NULL, date_ouverture VARCHAR(255) NOT NULL, INDEX IDX_1DAAE6484AEED04E (id_s_id), INDEX IDX_1DAAE6486EA32074 (id_responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE master (id INT AUTO_INCREMENT NOT NULL, id_s_id INT DEFAULT NULL, id_responsable_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, etablissement VARCHAR(255) NOT NULL, date_ouverture VARCHAR(255) NOT NULL, INDEX IDX_2D09A3D64AEED04E (id_s_id), INDEX IDX_2D09A3D66EA32074 (id_responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE6484AEED04E FOREIGN KEY (id_s_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE6486EA32074 FOREIGN KEY (id_responsable_id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D64AEED04E FOREIGN KEY (id_s_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D66EA32074 FOREIGN KEY (id_responsable_id) REFERENCES responsable (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE6486EA32074');
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D66EA32074');
        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE6484AEED04E');
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D64AEED04E');
        $this->addSql('DROP TABLE licence');
        $this->addSql('DROP TABLE master');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE specialite');
    }
}
