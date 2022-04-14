<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant", indexes={@ORM\Index(name="menuid", columns={"menuId"})})
 * @ORM\Entity
 */

 /**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantRepository")
 */
class Restaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=50, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Fourchette", type="integer", nullable=true)
     */
    private $fourchette;

    /**
     * @var int
     *
     * @ORM\Column(name="placeLibres", type="integer", nullable=false)
     */
    private $placelibres;

    /**
     * @var int
     *
     * @ORM\Column(name="placeReservees", type="integer", nullable=false)
     */
    private $placereservees;

    /**
     * @var int
     *
     * @ORM\Column(name="totalPlace", type="integer", nullable=false)
     */
    private $totalplace;

    /**
     * @var \Menu
     *
     * @ORM\ManyToOne(targetEntity="Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menuId", referencedColumnName="id")
     * })
     */
    private $menuid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getFourchette(): ?int
    {
        return $this->fourchette;
    }

    public function setFourchette(?int $fourchette): self
    {
        $this->fourchette = $fourchette;

        return $this;
    }

    public function getPlacelibres(): ?int
    {
        return $this->placelibres;
    }

    public function setPlacelibres(int $placelibres): self
    {
        $this->placelibres = $placelibres;

        return $this;
    }

    public function getPlacereservees(): ?int
    {
        return $this->placereservees;
    }

    public function setPlacereservees(int $placereservees): self
    {
        $this->placereservees = $placereservees;

        return $this;
    }

    public function getTotalplace(): ?int
    {
        return $this->totalplace;
    }

    public function setTotalplace(int $totalplace): self
    {
        $this->totalplace = $totalplace;

        return $this;
    }

    public function getMenuid(): ?Menu
    {
        return $this->menuid;
    }

    public function setMenuid(?Menu $menuid): self
    {
        $this->menuid = $menuid;

        return $this;
    }


}
