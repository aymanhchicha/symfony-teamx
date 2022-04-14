<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel", indexes={@ORM\Index(name="FK_Hotel_Reservation", columns={"ReservationID"})})
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="Prixnuit", type="integer", nullable=true)
     */
    private $prixnuit;

    /**
     * @var int
     *
     * @ORM\Column(name="HotelID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hotelid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ReservationID", type="integer", nullable=true)
     */
    private $reservationid;

    public function getPrixnuit(): ?int
    {
        return $this->prixnuit;
    }

    public function setPrixnuit(?int $prixnuit): self
    {
        $this->prixnuit = $prixnuit;

        return $this;
    }

    public function getHotelid(): ?int
    {
        return $this->hotelid;
    }

    public function getReservationid(): ?int
    {
        return $this->reservationid;
    }

    public function setReservationid(?int $reservationid): self
    {
        $this->reservationid = $reservationid;

        return $this;
    }


}
