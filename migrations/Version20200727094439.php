<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200727094439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(160) NOT NULL, image VARCHAR(160) NOT NULL, calories INT DEFAULT NULL, unite INT NOT NULL, type_ingredient VARCHAR(160) NOT NULL, vegan TINYINT(1) DEFAULT NULL, vegetarien TINYINT(1) DEFAULT NULL, gluten TINYINT(1) DEFAULT NULL, saison VARCHAR(160) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(160) NOT NULL, difficulte VARCHAR(160) DEFAULT NULL, duree INT DEFAULT NULL, cuisson INT DEFAULT NULL, photo VARCHAR(160) NOT NULL, ingredients_recette VARCHAR(160) DEFAULT NULL, instructions LONGTEXT DEFAULT NULL, type VARCHAR(160) NOT NULL, categorie VARCHAR(160) NOT NULL, nbre_part INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE table_recette_ingredients (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, ingredient_id INT DEFAULT NULL, quantite INT DEFAULT NULL, ordre INT DEFAULT NULL, INDEX IDX_7C735CE589312FE9 (recette_id), INDEX IDX_7C735CE5933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE table_recette_ingredients ADD CONSTRAINT FK_7C735CE589312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE table_recette_ingredients ADD CONSTRAINT FK_7C735CE5933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE table_recette_ingredients DROP FOREIGN KEY FK_7C735CE5933FE08C');
        $this->addSql('ALTER TABLE table_recette_ingredients DROP FOREIGN KEY FK_7C735CE589312FE9');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE table_recette_ingredients');
    }
}
