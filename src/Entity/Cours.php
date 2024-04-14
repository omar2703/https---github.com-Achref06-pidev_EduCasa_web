<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCour;

    #[ORM\Column(name: "nomCour", type: "string", length: 255, nullable: false)]
    private ?string $nomCours;

    #[ORM\Column(name: "dureeCours", type: "string", length: 255, nullable: false)]
    private ?string $dureeCours;

    #[ORM\Column(name: "niveauCours", type: "string", length: 255, nullable: false)]
    private ?string $niveauCours;

    #[ORM\ManyToOne(targetEntity: "Formation")]
    #[ORM\JoinColumn(name: "idFormation", referencedColumnName: "idFormation")]
    private ?Formation $formation;

    public function getIdCour(): ?int
    {
        return $this->idCour;
    }

    public function getNomCours(): ?string
    {
        return $this->nomCours;
    }

    public function setNomCours(string $nomCours): static
    {
        $this->nomCours = $nomCours;
        return $this;
    }

    public function getDureeCours(): ?string
    {
        return $this->dureeCours;
    }

    public function setDureeCours(string $dureeCours): static
    {
        $this->dureeCours = $dureeCours;
        return $this;
    }

    public function getNiveauCours(): ?string
    {
        return $this->niveauCours;
    }

    public function setNiveauCours(string $niveauCours): static
    {
        $this->niveauCours = $niveauCours;
        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;
        return $this;
    }
}
