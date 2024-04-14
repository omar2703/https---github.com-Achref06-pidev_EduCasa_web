<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvancementRepository::class)]
class Avancement
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $id = null;

    
    #[ORM\Column(name: "nbTentatives", type: "integer", nullable: false)]
    private $nbtentatives = null;

    
    #[ORM\ManyToOne(targetEntity: "Badge")]
    #[ORM\JoinColumn(name: "idB", referencedColumnName: "id")]
    private $idb = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbtentatives(): ?int
    {
        return $this->nbtentatives;
    }

    public function setNbtentatives(?int $nbtentatives): static
    {
        $this->nbtentatives = $nbtentatives;

        return $this;
    }

    public function getIdb(): ?Badge
    {
        return $this->idb;
    }

    public function setIdb(?Badge $idb): static
    {
        $this->idb = $idb;

        return $this;
    }
}
