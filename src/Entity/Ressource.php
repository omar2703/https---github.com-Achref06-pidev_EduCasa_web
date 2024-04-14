<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "titre", type: "string", length: 255, nullable: false)]
    private $titre = null;

    #[ORM\Column(name: "lien", type: "string", length: 255, nullable: false)]
    private $lien = null;

    #[ORM\ManyToOne(targetEntity: "Offre")]
    #[ORM\JoinColumn(name: "offre_id", referencedColumnName: "id")]
    private $offre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;
        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;
        return $this;
    }
}
