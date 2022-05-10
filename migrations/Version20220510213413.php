<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510213413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FB6DD3E9C');
        $this->addSql('DROP INDEX fk_eb95123fb6dd3e9c ON restaurant');
        $this->addSql('CREATE INDEX IDX_EB95123FB6DD3E9C ON restaurant (menuId)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FB6DD3E9C FOREIGN KEY (menuId) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE student CHANGE nsc nsc VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tente DROP FOREIGN KEY idcentrecamp');
        $this->addSql('ALTER TABLE tente CHANGE idCentreCamping idCentreCamping INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tente ADD CONSTRAINT FK_F24A792CAE7E8872 FOREIGN KEY (idCentreCamping) REFERENCES centrecamping (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FB6DD3E9C');
        $this->addSql('DROP INDEX idx_eb95123fb6dd3e9c ON restaurant');
        $this->addSql('CREATE INDEX FK_EB95123FB6DD3E9C ON restaurant (menuId)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FB6DD3E9C FOREIGN KEY (menuId) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE student CHANGE nsc nsc VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tente DROP FOREIGN KEY FK_F24A792CAE7E8872');
        $this->addSql('ALTER TABLE tente CHANGE idCentreCamping idCentreCamping INT NOT NULL');
        $this->addSql('ALTER TABLE tente ADD CONSTRAINT idcentrecamp FOREIGN KEY (idCentreCamping) REFERENCES centrecamping (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
