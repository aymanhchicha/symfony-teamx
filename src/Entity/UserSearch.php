<?php

namespace App\Entity;

use App\Repository\UserSearchRepository;



class UserSearch
{


    /**
     *@var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
}
