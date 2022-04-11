<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historique")
 * @ORM\Entity
 */
class Historique
{
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Dernfois", type="date", nullable=true)
     */
    private $dernfois;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Nbres", type="integer", nullable=true)
     */
    private $nbres;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Premfois", type="date", nullable=true)
     */
    private $premfois;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Quota", type="integer", nullable=true)
     */
    private $quota;

    /**
     * @var int
     *
     * @ORM\Column(name="HistoriqueID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $historiqueid;

    /**
     * @var int
     *
     * @ORM\Column(name="UtilisateurID", type="integer", nullable=false)
     */
    private $utilisateurid;

    public function getDernfois(): ?\DateTimeInterface
    {
        return $this->dernfois;
    }

    public function setDernfois(?\DateTimeInterface $dernfois): self
    {
        $this->dernfois = $dernfois;

        return $this;
    }

    public function getNbres(): ?int
    {
        return $this->nbres;
    }

    public function setNbres(?int $nbres): self
    {
        $this->nbres = $nbres;

        return $this;
    }

    public function getPremfois(): ?\DateTimeInterface
    {
        return $this->premfois;
    }

    public function setPremfois(?\DateTimeInterface $premfois): self
    {
        $this->premfois = $premfois;

        return $this;
    }

    public function getQuota(): ?int
    {
        return $this->quota;
    }

    public function setQuota(?int $quota): self
    {
        $this->quota = $quota;

        return $this;
    }

    public function getHistoriqueid(): ?int
    {
        return $this->historiqueid;
    }

    public function getUtilisateurid(): ?int
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(int $utilisateurid): self
    {
        $this->utilisateurid = $utilisateurid;

        return $this;
    }


}
