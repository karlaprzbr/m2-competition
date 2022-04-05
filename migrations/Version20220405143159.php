<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405143159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat ADD soft_skills LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD hard_skills LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD work_view LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD company_values LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD team_spirit LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD salaire INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP soft_skills, DROP hard_skills, DROP work_view, DROP company_values, DROP team_spirit, DROP salaire');
    }
}
