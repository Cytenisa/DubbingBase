<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240223072122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE dubbing_movie ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE dubbing_serie ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE locale ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE voice_actor ADD va_profile_picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE voice_actor ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE dubbing_movie_id_seq');
        $this->addSql('SELECT setval(\'dubbing_movie_id_seq\', (SELECT MAX(id) FROM dubbing_movie))');
        $this->addSql('ALTER TABLE dubbing_movie ALTER id SET DEFAULT nextval(\'dubbing_movie_id_seq\')');
        $this->addSql('CREATE SEQUENCE locale_id_seq');
        $this->addSql('SELECT setval(\'locale_id_seq\', (SELECT MAX(id) FROM locale))');
        $this->addSql('ALTER TABLE locale ALTER id SET DEFAULT nextval(\'locale_id_seq\')');
        $this->addSql('ALTER TABLE voice_actor DROP va_profile_picture');
        $this->addSql('CREATE SEQUENCE voice_actor_id_seq');
        $this->addSql('SELECT setval(\'voice_actor_id_seq\', (SELECT MAX(id) FROM voice_actor))');
        $this->addSql('ALTER TABLE voice_actor ALTER id SET DEFAULT nextval(\'voice_actor_id_seq\')');
        $this->addSql('CREATE SEQUENCE account_id_seq');
        $this->addSql('SELECT setval(\'account_id_seq\', (SELECT MAX(id) FROM account))');
        $this->addSql('ALTER TABLE account ALTER id SET DEFAULT nextval(\'account_id_seq\')');
        $this->addSql('CREATE SEQUENCE dubbing_serie_id_seq');
        $this->addSql('SELECT setval(\'dubbing_serie_id_seq\', (SELECT MAX(id) FROM dubbing_serie))');
        $this->addSql('ALTER TABLE dubbing_serie ALTER id SET DEFAULT nextval(\'dubbing_serie_id_seq\')');
    }
}
