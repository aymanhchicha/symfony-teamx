<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre", indexes={@ORM\Index(name="FK_Chambre_Hotel", columns={"HotelID"})})
 * @ORM\Entity
 */
class Chambre
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="Num", type="integer", nullable=true)
     */
    private $num;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Typechambre", type="string", length=50, nullable=true)
     */
    private $typechambre;

    /**
     * @var int
     *
     * @ORM\Column(name="ChambreID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chambreid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="HotelID", type="integer", nullable=true)
     */
    private $hotelid;

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(?int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getTypechambre(): ?string
    {
        return $this->typechambre;
    }

    public function setTypechambre(?string $typechambre): self
    {
        $this->typechambre = $typechambre;

        return $this;
    }

    public function getChambreid(): ?int
    {
        return $this->chambreid;
    }

    public function getHotelid(): ?int
    {
        return $this->hotelid;
    }

    public function setHotelid(?int $hotelid): self
    {
        $this->hotelid = $hotelid;

        return $this;
    }


}
