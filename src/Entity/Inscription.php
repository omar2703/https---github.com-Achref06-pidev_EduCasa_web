<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idInscription;

    #[ORM\Column(name: "nomEtudiant", type: "string", length: 255, nullable: false)]
    private ?string $nomEtudiant;

    #[ORM\Column(name: "prenomEtudiant", type: "string", length: 255, nullable: false)]
    private ?string $prenomEtudiant;

    #[ORM\Column(name: "email", type: "string", length: 255, nullable: false)]
    private ?string $email;

    #[ORM\Column(name: "dateInscription", type: "string", length: 255, nullable: false)]
    private ?string $dateInscription;

    #[ORM\Column(name: "IDFormation", type: "integer", nullable: false)]
    private ?int $IDFormation;

    public function getIdInscription(): ?int
    {
        return $this->idInscription;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nomEtudiant;
    }

    public function setNomEtudiant(string $nomEtudiant): static
    {
        $this->nomEtudiant = $nomEtudiant;
        return $this;
    }

    public function getPrenomEtudiant(): ?string
    {
        return $this->prenomEtudiant;
    }

    public function setPrenomEtudiant(string $prenomEtudiant): static
    {
        $this->prenomEtudiant = $prenomEtudiant;
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

    public function getDateInscription(): ?string
    {
        return $this->dateInscription;
    }

    public function setDateInscription(string $dateInscription): static
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }

    public function getIDFormation(): ?int
    {
        return $this->IDFormation;
    }

    public function setIDFormation(int $IDFormation): static
    {
        $this->IDFormation = $IDFormation;
        return $this;
    }
}
