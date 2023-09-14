<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912094535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id SERIAL NOT NULL, ac_login VARCHAR(255) NOT NULL, ac_idtrakt VARCHAR(255) DEFAULT NULL, ac_pwd VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE dubbing_movie (id SERIAL NOT NULL, id_lc_code_id INT DEFAULT NULL, id_vaidactor_id INT DEFAULT NULL, tmdb_id_actor INT NOT NULL, tmdb_id_movie INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FD69B357DE85713D ON dubbing_movie (id_lc_code_id)');
        $this->addSql('CREATE INDEX IDX_FD69B3575BBC0CC0 ON dubbing_movie (id_vaidactor_id)');
        $this->addSql('CREATE TABLE dubbing_serie (id SERIAL NOT NULL, id_lc_code_id INT DEFAULT NULL, id_vaidactor_id INT DEFAULT NULL, tmdb_id_actor INT NOT NULL, tmdb_id_serie INT NOT NULL, tmdb_season_number_start INT NOT NULL, tmdb_season_number_end INT NOT NULL, tmdb_episode_number_start INT NOT NULL, tmdb_episode_number_end INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4A0DD20CDE85713D ON dubbing_serie (id_lc_code_id)');
        $this->addSql('CREATE INDEX IDX_4A0DD20C5BBC0CC0 ON dubbing_serie (id_vaidactor_id)');
        $this->addSql('CREATE TABLE locale (id SERIAL NOT NULL, lc_code VARCHAR(255) NOT NULL, lc_label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE voice_actor (id SERIAL NOT NULL, va_lastname VARCHAR(255) NOT NULL, va_firstname VARCHAR(255) NOT NULL, va_birthdate DATE DEFAULT NULL, va_nationality VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE dubbing_movie ADD CONSTRAINT FK_FD69B357DE85713D FOREIGN KEY (id_lc_code_id) REFERENCES locale (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dubbing_movie ADD CONSTRAINT FK_FD69B3575BBC0CC0 FOREIGN KEY (id_vaidactor_id) REFERENCES voice_actor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dubbing_serie ADD CONSTRAINT FK_4A0DD20CDE85713D FOREIGN KEY (id_lc_code_id) REFERENCES locale (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dubbing_serie ADD CONSTRAINT FK_4A0DD20C5BBC0CC0 FOREIGN KEY (id_vaidactor_id) REFERENCES voice_actor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE account_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dubbing_movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dubbing_serie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE locale_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE voice_actor_id_seq CASCADE');
        $this->addSql('ALTER TABLE dubbing_movie DROP CONSTRAINT FK_FD69B357DE85713D');
        $this->addSql('ALTER TABLE dubbing_movie DROP CONSTRAINT FK_FD69B3575BBC0CC0');
        $this->addSql('ALTER TABLE dubbing_serie DROP CONSTRAINT FK_4A0DD20CDE85713D');
        $this->addSql('ALTER TABLE dubbing_serie DROP CONSTRAINT FK_4A0DD20C5BBC0CC0');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE dubbing_movie');
        $this->addSql('DROP TABLE dubbing_serie');
        $this->addSql('DROP TABLE locale');
        $this->addSql('DROP TABLE voice_actor');
    }
}
