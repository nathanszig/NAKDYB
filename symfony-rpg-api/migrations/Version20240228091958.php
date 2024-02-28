<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228091958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, physical INT NOT NULL, mental INT NOT NULL, social INT NOT NULL, INDEX IDX_937AB034E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, news_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, scenario LONGTEXT DEFAULT NULL, INDEX IDX_232B318CB5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_place (game_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_462E2A42E48FD905 (game_id), INDEX IDX_462E2A42DA6A219 (place_id), PRIMARY KEY(game_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_npc (game_id INT NOT NULL, npc_id INT NOT NULL, INDEX IDX_5DD665E9E48FD905 (game_id), INDEX IDX_5DD665E9CA7D6B89 (npc_id), PRIMARY KEY(game_id, npc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_monster (game_id INT NOT NULL, monster_id INT NOT NULL, INDEX IDX_B19CB9DBE48FD905 (game_id), INDEX IDX_B19CB9DBC5FF1223 (monster_id), PRIMARY KEY(game_id, monster_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, physical INT NOT NULL, mental INT NOT NULL, social INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster_place (monster_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_2E56F88C5FF1223 (monster_id), INDEX IDX_2E56F88DA6A219 (place_id), PRIMARY KEY(monster_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE npc (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, role JSON NOT NULL COMMENT \'(DC2Type:json)\', physical INT NOT NULL, mental INT NOT NULL, social INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE npc_place (npc_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_2B419782CA7D6B89 (npc_id), INDEX IDX_2B419782DA6A219 (place_id), PRIMARY KEY(npc_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE game_place ADD CONSTRAINT FK_462E2A42E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_place ADD CONSTRAINT FK_462E2A42DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_npc ADD CONSTRAINT FK_5DD665E9E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_npc ADD CONSTRAINT FK_5DD665E9CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_monster ADD CONSTRAINT FK_B19CB9DBE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_monster ADD CONSTRAINT FK_B19CB9DBC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE monster_place ADD CONSTRAINT FK_2E56F88C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE monster_place ADD CONSTRAINT FK_2E56F88DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE npc_place ADD CONSTRAINT FK_2B419782CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE npc_place ADD CONSTRAINT FK_2B419782DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034E48FD905');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CB5A459A0');
        $this->addSql('ALTER TABLE game_place DROP FOREIGN KEY FK_462E2A42E48FD905');
        $this->addSql('ALTER TABLE game_place DROP FOREIGN KEY FK_462E2A42DA6A219');
        $this->addSql('ALTER TABLE game_npc DROP FOREIGN KEY FK_5DD665E9E48FD905');
        $this->addSql('ALTER TABLE game_npc DROP FOREIGN KEY FK_5DD665E9CA7D6B89');
        $this->addSql('ALTER TABLE game_monster DROP FOREIGN KEY FK_B19CB9DBE48FD905');
        $this->addSql('ALTER TABLE game_monster DROP FOREIGN KEY FK_B19CB9DBC5FF1223');
        $this->addSql('ALTER TABLE monster_place DROP FOREIGN KEY FK_2E56F88C5FF1223');
        $this->addSql('ALTER TABLE monster_place DROP FOREIGN KEY FK_2E56F88DA6A219');
        $this->addSql('ALTER TABLE npc_place DROP FOREIGN KEY FK_2B419782CA7D6B89');
        $this->addSql('ALTER TABLE npc_place DROP FOREIGN KEY FK_2B419782DA6A219');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_place');
        $this->addSql('DROP TABLE game_npc');
        $this->addSql('DROP TABLE game_monster');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE monster_place');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE npc');
        $this->addSql('DROP TABLE npc_place');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE user');
    }
}
