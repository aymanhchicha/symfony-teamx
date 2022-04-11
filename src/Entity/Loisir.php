<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loisir
 *
 * @ORM\Table(name="loisir", indexes={@ORM\Index(name="FK_Loisir_Reservation", columns={"ReservationID"})})
 * @ORM\Entity
 */
class Loisir
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="Pegi", type="string", length=50, nullable=true)
     */
    private $pegi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Typeloisir", type="string", length=50, nullable=true)
     */
    private $typeloisir;

    /**
     * @var int
     *
     * @ORM\Column(name="LoisirID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loisirid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ReservationID", type="integer", nullable=true)
     */
    private $reservationid;

    public function getPegi(): ?string
    {
        return $this->pegi;
    }

    public function setPegi(?string $pegi): self
    {
        $this->pegi = $pegi;

        return $this;
    }

    public function getTypeloisir(): ?string
    {
        return $this->typeloisir;
    }

    public function setTypeloisir(?string $typeloisir): self
    {
        $this->typeloisir = $typeloisir;

        return $this;
    }

    public function getLoisirid(): ?int
    {
        return $this->loisirid;
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
