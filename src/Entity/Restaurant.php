<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     *  * @Assert\NotBlank(message=" description doit etre non vide")
     * @Assert\Length(
     *      min = 7,
     *      max = 100,
     *      minMessage = "doit etre >=7 ",
     *      maxMessage = "doit etre <=100" )
     * @ORM\Column(name="Description", type="string", length=50, nullable=true)
     */
    private $description;

    /**
     * @var string
     * * @Assert\NotBlank(message=" nom doit etre non vide")
     * @Assert\Length(
     *      min = 7,
     *      max = 100,
     *      minMessage = "doit etre au min de 4 lettres ",
     *      maxMessage = "doit etre maximuim de 30 lettres" )
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var int|null
     * * @Assert\NotBlank(message=" LE NOMBRE DE FOURCHETTES EST LIMITER ENTRE 1 ET 5")
     * @Assert\GreaterThanOrEqual(value=1,message="le nombre de fourchettes doit etre entre 1 et 5")
     * * @Assert\LessThanOrEqual(value=5,message="le nombre de fourchettes doit etre entre 1 et 5")
     * @ORM\Column(name="Fourchette", type="integer", nullable=true)
     */
    private $fourchette;

    /**
     * @var int
     * * * @Assert\NotBlank(message=" LE NOMBRE DE places EST LIMITER ENTRE 5 ET 100")
     * @Assert\LessThanOrEqual(value=100,message="le nombre de fourchettes doit etre entre 5 et 100")
     * * @Assert\GreaterThanOrEqual(value=5,message="le nombre de fourchettes doit etre entre 5 et 100")
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
