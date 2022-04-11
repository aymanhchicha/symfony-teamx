<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaisonDhote
 *
 * @ORM\Table(name="maison_dhote")
 * @ORM\Entity
 */
class MaisonDhote
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse", type="string", length=100, nullable=true)
     */
    private $adresse;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Surface", type="integer", nullable=true)
     */
    private $surface;

    /**
     * @var int
     *
     * @ORM\Column(name="Maison_dhoteID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $maisonDhoteid;

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(?int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getMaisonDhoteid(): ?int
    {
        return $this->maisonDhoteid;
    }


}
