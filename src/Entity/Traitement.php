<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TraitementRepository::class)]
class Traitement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "numero_reclamation", type: "integer", nullable: false)]
    private ?int $numeroReclamation = null;

    #[ORM\Column(name: "reponse", type: "text", length: 65535, nullable: false)]
    private ?string $reponse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroReclamation(): ?int
    {
        return $this->numeroReclamation;
    }

    public function setNumeroReclamation(int $numeroReclamation): self
    {
        $this->numeroReclamation = $numeroReclamation;
        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): self
    {
        $this->reponse = $reponse;
        return $this;
    }
}