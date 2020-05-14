<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200506085106 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lego_themes (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(255) NOT NULL, year_from VARCHAR(10) DEFAULT NULL, year_to VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lego_sets (id INT AUTO_INCREMENT NOT NULL, set_id INT NOT NULL, number VARCHAR(255) DEFAULT NULL, number_variant VARCHAR(10) DEFAULT NULL, name VARCHAR(255) NOT NULL, year INT NOT NULL, theme VARCHAR(255) NOT NULL, theme_group VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, released TINYINT(1) NOT NULL, pieces INT NOT NULL, thumbnail_url VARCHAR(255) DEFAULT NULL, image_url VARCHAR(255) DEFAULT NULL, rating DOUBLE PRECISION DEFAULT NULL, instructions_count INT DEFAULT NULL, additional_image_count INT DEFAULT NULL, eancode VARCHAR(255) DEFAULT NULL, last_updated DATETIME NOT NULL, scrap_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lego_subthemes (id INT AUTO_INCREMENT NOT NULL, subtheme VARCHAR(255) NOT NULL, theme VARCHAR(255) NOT NULL, year_from VARCHAR(10) DEFAULT NULL, year_to VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lego_themes');
        $this->addSql('DROP TABLE lego_sets');
        $this->addSql('DROP TABLE lego_subthemes');
    }
}
