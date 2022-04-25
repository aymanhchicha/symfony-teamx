<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425014608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, Nom VARCHAR(50) DEFAULT NULL, Numtel BIGINT DEFAULT NULL, Prenom VARCHAR(30) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambre CHANGE ChambreID ChambreID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE historique CHANGE HistoriqueID HistoriqueID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE hotel CHANGE HotelID HotelID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE loisir CHANGE LoisirID LoisirID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE maison_dhote CHANGE Maison_dhoteID Maison_dhoteID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE menuplat CHANGE idmenu idmenu INT DEFAULT NULL, CHANGE idplat idplat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place CHANGE PlaceID PlaceID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE ReservationID ReservationID INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE reservationcentrecamping CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY menuid');
        $this->addSql('ALTER TABLE restaurant CHANGE menuId menuId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FB6DD3E9C FOREIGN KEY (menuId) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE student CHANGE nsc nsc VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tente DROP FOREIGN KEY idcentrecamp');
        $this->addSql('ALTER TABLE tente CHANGE idCentreCamping idCentreCamping INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tente ADD CONSTRAINT FK_F24A792CAE7E8872 FOREIGN KEY (idCentreCamping) REFERENCES centrecamping (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE chambre CHANGE ChambreID ChambreID INT NOT NULL');
        $this->addSql('ALTER TABLE historique CHANGE HistoriqueID HistoriqueID INT NOT NULL');
        $this->addSql('ALTER TABLE hotel CHANGE HotelID HotelID INT NOT NULL');
        $this->addSql('ALTER TABLE loisir CHANGE LoisirID LoisirID INT NOT NULL');
        $this->addSql('ALTER TABLE maison_dhote CHANGE Maison_dhoteID Maison_dhoteID INT NOT NULL');
        $this->addSql('ALTER TABLE menuplat CHANGE idmenu idmenu INT NOT NULL, CHANGE idplat idplat INT NOT NULL');
        $this->addSql('ALTER TABLE place CHANGE PlaceID PlaceID INT NOT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE ReservationID ReservationID INT NOT NULL');
        $this->addSql('ALTER TABLE reservationcentrecamping CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FB6DD3E9C');
        $this->addSql('ALTER TABLE restaurant CHANGE menuId menuId INT NOT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT menuid FOREIGN KEY (menuId) REFERENCES menu (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student CHANGE nsc nsc VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tente DROP FOREIGN KEY FK_F24A792CAE7E8872');
        $this->addSql('ALTER TABLE tente CHANGE idCentreCamping idCentreCamping INT NOT NULL');
        $this->addSql('ALTER TABLE tente ADD CONSTRAINT idcentrecamp FOREIGN KEY (idCentreCamping) REFERENCES centrecamping (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
