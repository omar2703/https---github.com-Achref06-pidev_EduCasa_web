<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(name: "nom", type: "string", length: 255, nullable: false)]
    private ?string $nom;

    #[ORM\Column(name: "prix", type: "float", precision: 10, scale: 0, nullable: false)]
    private ?float $prix;

    #[ORM\Column(name: "statut", type: "string", length: 255, nullable: false)]
    private ?string $statut;

    #[ORM\Column(name: "description", type: "string", length: 255, nullable: false)]
    private ?string $description;

    #[ORM\Column(name: "image", type: "string", length: 255, nullable: false)]
    private ?string $image;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
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
