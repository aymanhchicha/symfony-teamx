<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Numtel", type="bigint", nullable=true)
     */
    private $numtel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Prenom", type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Role", type="string", length=50, nullable=true)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="mp", type="string", length=50, nullable=false)
     */
    private $mp;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(?string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getMp(): ?string
    {
        return $this->mp;
    }

    public function setMp(string $mp): self
    {
        $this->mp = $mp;

        return $this;
    }

    public function __toString()
    {
       return $this->email;
    }


}
