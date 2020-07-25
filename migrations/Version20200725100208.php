<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200725100208 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE table_recette_ingredient');
        $this->addSql('DROP TABLE table_recette_ingredients');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(160) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, difficulte VARCHAR(160) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, duree INT DEFAULT NULL, cuisson INT DEFAULT NULL, photo VARCHAR(160) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ingredients_recette VARCHAR(160) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, instructions LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(160) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, categorie VARCHAR(160) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nbr_part INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE table_recette_ingredient (id INT AUTO_INCREMENT NOT NULL, quantite INT NOT NULL, ordre INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE table_recette_ingredients (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, INDEX IDX_7C735CE589312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }
}
