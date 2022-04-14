<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table(name="place", indexes={@ORM\Index(name="FK_Place_Restaurant", columns={"RestaurantID"})})
 * @ORM\Entity
 */
class Place
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="Id", type="integer", nullable=true)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Placeslibres", type="integer", nullable=true)
     */
    private $placeslibres;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Placesreservees", type="string", length=50, nullable=true)
     */
    private $placesreservees;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Placestotales", type="integer", nullable=true)
     */
    private $placestotales;

    /**
     * @var int
     *
     * @ORM\Column(name="PlaceID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $placeid;

    /**
     * @var int
     *
     * @ORM\Column(name="RestaurantID", type="integer", nullable=false)
     */
    private $restaurantid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPlaceslibres(): ?int
    {
        return $this->placeslibres;
    }

    public function setPlaceslibres(?int $placeslibres): self
    {
        $this->placeslibres = $placeslibres;

        return $this;
    }

    public function getPlacesreservees(): ?string
    {
        return $this->placesreservees;
    }

    public function setPlacesreservees(?string $placesreservees): self
    {
        $this->placesreservees = $placesreservees;

        return $this;
    }

    public function getPlacestotales(): ?int
    {
        return $this->placestotales;
    }

    public function setPlacestotales(?int $placestotales): self
    {
        $this->placestotales = $placestotales;

        return $this;
    }

    public function getPlaceid(): ?int
    {
        return $this->placeid;
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
