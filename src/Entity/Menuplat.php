<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menuplat
 *
 * @ORM\Table(name="menuplat", indexes={@ORM\Index(name="menufk", columns={"idmenu"}), @ORM\Index(name="platfk", columns={"idplat"})})
 * @ORM\Entity
 */

 /**
 * @ORM\Entity(repositoryClass="App\Repository\MenuPlatRepository")
 */
class Menuplat
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
     * @var \Menu
     *
     * @ORM\ManyToOne(targetEntity="Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmenu", referencedColumnName="id")
     * })
     */
    private $idmenu;

    /**
     * @var \Plat
     *
     * @ORM\ManyToOne(targetEntity="Plat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idplat", referencedColumnName="PlatID")
     * })
     */
    private $idplat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdmenu(): ?Menu
    {
        return $this->idmenu;
    }

    public function setIdmenu(?Menu $idmenu): self
    {
        $this->idmenu = $idmenu;

        return $this;
    }

    public function getIdplat(): ?Plat
    {
        return $this->idplat;
    }

    public function setIdplat(?Plat $idplat): self
    {
        $this->idplat = $idplat;

        return $this;
    }


}
