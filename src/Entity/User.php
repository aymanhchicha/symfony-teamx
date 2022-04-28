<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Asserts;



/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @Asserts\NotBlank(message="Email doit etre non vide")
     * @Asserts\Email(
     *     message = "The email is not a valid email."
     * )
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Role", type="string", length=50, nullable=true)
     */
    private $roles ;

    /**
     * @var string The hashed password
     * @Asserts\NotBlank(message="Mot de passe doit etre non vide")
     * @Asserts\Length(
     *     min=8,
     *     minMessage="votre Mot de passe doit avoir minimum 8 caractére"
     * )
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @var string|null
     * @Asserts\NotBlank(message="Nom doit etre non vide")
     * @ORM\Column(name="Nom", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var int|null
     * @Asserts\NotBlank(message="Numéro doit etre non vide")
     * @ORM\Column(name="Numtel", type="bigint", nullable=true)
     */
    private $numtel;

    /**
     * @var string|null
     * @Asserts\NotBlank(message="Prenom doit etre non vide")
     * @ORM\Column(name="Prenom", type="string", length=30, nullable=true)
     */
    private $prenom;

    protected $captchaCode;

    public function getCaptchaCode()
    {
        return $this->captchaCode;
    }

    public function setCaptchaCode($captchaCode)
    {
        $this->captchaCode = $captchaCode;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return int|null
     */
    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    /**
     * @param int|null $numtel
     */
    public function setNumtel(?int $numtel): void
    {
        $this->numtel = $numtel;
    }

    /**
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string|null $prenom
     */
    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
