<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idFormation")]
    private ?int $idFormation;

    #[ORM\Column(name: "nomFormation", type: "string", length: 255, nullable: false)]
    private ?string $nomFormation;

    #[ORM\Column(name: "dureeFormation", type: "string", length: 255, nullable: false)]
    private ?string $dureeFormation;

    #[ORM\Column(name: "niveauFormation", type: "string", length: 255, nullable: false)]
    private ?string $niveauFormation;

    #[ORM\Column(name: "nbJours", type: "integer", nullable: false)]
    private ?int $nbJours;

    #[ORM\Column(name: "image", type: "string", length: 255, nullable: false)]
    private ?string $image;

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function getNomFormation(): ?string
    {
        return $this->nomFormation;
    }

    public function setNomFormation(string $nomFormation): static
    {
        $this->nomFormation = $nomFormation;
        return $this;
    }

    public function getDureeFormation(): ?string
    {
        return $this->dureeFormation;
    }

    public function setDureeFormation(string $dureeFormation): static
    {
        $this->dureeFormation = $dureeFormation;
        return $this;
    }

    public function getNiveauFormation(): ?string
    {
        return $this->niveauFormation;
    }

    public function setNiveauFormation(string $niveauFormation): static
    {
        $this->niveauFormation = $niveauFormation;
        return $this;
    }

    public function getNbJours(): ?int
    {
        return $this->nbJours;
    }

    public function setNbJours(int $nbJours): static
    {
        $this->nbJours = $nbJours;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;
        return $this;
    }
}