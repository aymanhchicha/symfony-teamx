<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_Reservation_Utilisateur", columns={"UtilisateurID"}), @ORM\Index(name="FK_Reservation_Centrecamping", columns={"CentrecampingID"}), @ORM\Index(name="FK_Reservation_Restaurant", columns={"RestaurantID"}), @ORM\Index(name="FK_Reservation_Maison_dhote", columns={"Maison_dhoteID"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="Date", type="integer", nullable=true)
     */
    private $date;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="Etat", type="boolean", nullable=true)
     */
    private $etat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Nbpersonnes", type="integer", nullable=true)
     */
    private $nbpersonnes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Persres", type="string", length=50, nullable=true)
     */
    private $persres;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Typeresv", type="string", length=50, nullable=true)
     */
    private $typeresv;

    /**
     * @var int
     *
     * @ORM\Column(name="ReservationID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reservationid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CentrecampingID", type="integer", nullable=true)
     */
    private $centrecampingid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Maison_dhoteID", type="integer", nullable=true)
     */
    private $maisonDhoteid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="UtilisateurID", type="integer", nullable=true)
     */
    private $utilisateurid;

    /**
     * @var int
     *
     * @ORM\Column(name="RestaurantID", type="integer", nullable=false)
     */
    private $restaurantid;

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(?int $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(?bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNbpersonnes(): ?int
    {
        return $this->nbpersonnes;
    }

    public function setNbpersonnes(?int $nbpersonnes): self
    {
        $this->nbpersonnes = $nbpersonnes;

        return $this;
    }

    public function getPersres(): ?string
    {
        return $this->persres;
    }

    public function setPersres(?string $persres): self
    {
        $this->persres = $persres;

        return $this;
    }

    public function getTyperesv(): ?string
    {
        return $this->typeresv;
    }

    public function setTyperesv(?string $typeresv): self
    {
        $this->typeresv = $typeresv;

        return $this;
    }

    public function getReservationid(): ?int
    {
        return $this->reservationid;
    }

    public function getCentrecampingid(): ?int
    {
        return $this->centrecampingid;
    }

    public function setCentrecampingid(?int $centrecampingid): self
    {
        $this->centrecampingid = $centrecampingid;

        return $this;
    }

    public function getMaisonDhoteid(): ?int
    {
        return $this->maisonDhoteid;
    }

    public function setMaisonDhoteid(?int $maisonDhoteid): self
    {
        $this->maisonDhoteid = $maisonDhoteid;

        return $this;
    }

    public function getUtilisateurid(): ?int
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(?int $utilisateurid): self
    {
        $this->utilisateurid = $utilisateurid;

        return $this;
    }

    public function getRestaurantid(): ?int
    {
        return $this->restaurantid;
    }

    public function setRestaurantid(int $restaurantid): self
    {
        $this->restaurantid = $restaurantid;

        return $this;
    }


}
