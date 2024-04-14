<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonneesRepository::class)]
class Donnees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idP;

    #[ORM\Column(name: "idF", type: "integer", nullable: false)]
    private ?int $idF;

    #[ORM\Column(name: "nom", type: "string", length: 255, nullable: false)]
    private ?string $nom;

    #[ORM\Column(name: "prenom", type: "string", length: 255, nullable: false)]
    private ?string $prenom;

    #[ORM\Column(name: "dateN", type: "date", nullable: false)]
    private ?\DateTimeInterface $dateN;

    #[ORM\Column(name: "email", type: "string", length: 255, nullable: false)]
    private ?string $email;

    #[ORM\Column(name: "experience", type: "string", length: 255, nullable: false)]
    private ?string $experience;

    #[ORM\Column(name: "motivation", type: "string", length: 255, nullable: false)]
    private ?string $motivation;

    #[ORM\Column(name: "matiere", type: "string", length: 255, nullable: false)]
    private ?string $matiere;

    #[ORM\Column(name: "diplome", type: "string", length: 255, nullable: false)]
    private ?string $diplome;

    public function getIdP(): ?int
    {
        return $this->idP;
    }

    public function getIdF(): ?int
    {
        return $this->idF;
    }

    public function setIdF(int $idF): static
    {
        $this->idF = $idF;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getDateN(): ?\DateTimeInterface
    {
        return $this->dateN;
    }

    public function setDateN(\DateTimeInterface $dateN): static
    {
        $this->dateN = $dateN;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): static
    {
        $this->experience = $experience;
        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(string $motivation): static
    {
        $this->motivation = $motivation;
        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): static
    {
        $this->matiere = $matiere;
        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): static
    {
        $this->diplome = $diplome;
        return $this;
    }
}
