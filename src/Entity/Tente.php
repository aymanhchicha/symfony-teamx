<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tente
 *
 * @ORM\Table(name="tente", indexes={@ORM\Index(name="idcentrecamp", columns={"idCentreCamping"})})
 * @ORM\Entity
 */
class Tente
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=30, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlaces", type="integer", nullable=false)
     */
    private $nbplaces;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var \Centrecamping
     *
     * @ORM\ManyToOne(targetEntity="Centrecamping")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCentreCamping", referencedColumnName="id")
     * })
     */
    private $idcentrecamping;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdcentrecamping(): ?Centrecamping
    {
        return $this->idcentrecamping;
    }

    public function setIdcentrecamping(?Centrecamping $idcentrecamping): self
    {
        $this->idcentrecamping = $idcentrecamping;

        return $this;
    }


}
