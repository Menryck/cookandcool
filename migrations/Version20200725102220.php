<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200725102220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE table_recette_ingredients (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, ingredient_id INT DEFAULT NULL, quantite INT DEFAULT NULL, ordre INT DEFAULT NULL, INDEX IDX_7C735CE589312FE9 (recette_id), INDEX IDX_7C735CE5933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE table_recette_ingredients ADD CONSTRAINT FK_7C735CE589312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE table_recette_ingredients ADD CONSTRAINT FK_7C735CE5933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE table_recette_ingredients');
    }
}
