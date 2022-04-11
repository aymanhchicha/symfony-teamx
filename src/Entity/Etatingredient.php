<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etatingredient
 *
 * @ORM\Table(name="etatingredient")
 * @ORM\Entity
 */
class Etatingredient
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
     * @var bool
     *
     * @ORM\Column(name="principal", type="boolean", nullable=false)
     */
    private $principal;

    /**
     * @var bool
     *
     * @ORM\Column(name="supplementaire", type="boolean", nullable=false)
     */
    private $supplementaire;

    /**
     * @var string
     *
     * @ORM\Column(name="etatIng", type="string", length=30, nullable=false)
     */
    private $etating;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrincipal(): ?bool
    {
        return $this->principal;
    }

    public function setPrincipal(bool $principal): self
    {
        $this->principal = $principal;

        return $this;
    }

    public function getSupplementaire(): ?bool
    {
        return $this->supplementaire;
    }

    public function setSupplementaire(bool $supplementaire): self
    {
        $this->supplementaire = $supplementaire;

        return $this;
    }

    public function getEtating(): ?string
    {
        return $this->etating;
    }

    public function setEtating(string $etating): self
    {
        $this->etating = $etating;

        return $this;
    }


}
