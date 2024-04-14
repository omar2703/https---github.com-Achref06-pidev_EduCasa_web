<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
class Abonnement
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column(name: "duree", type: "string", length: 255, nullable: false)]
    private $duree = null;

    
    #[ORM\ManyToOne(targetEntity: "Offre")]
    #[ORM\JoinColumn(name: "idO", referencedColumnName: "id")]
    private $ido = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getIdo(): ?Offre
    {
        return $this->ido;
    }

    public function setIdo(?Offre $ido): static
    {
        $this->ido = $ido;

        return $this;
    }
}