<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220407231355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat ADD date_naissance DATE DEFAULT NULL, ADD localisation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE diplome ADD eccole VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD entreprise VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP date_naissance, DROP localisation');
        $this->addSql('ALTER TABLE diplome DROP eccole');
        $this->addSql('ALTER TABLE entreprise DROP description');
        $this->addSql('ALTER TABLE experience DROP entreprise');
    }
}
