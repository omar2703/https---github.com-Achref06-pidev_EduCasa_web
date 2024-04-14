<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadgeRepository::class)]
class Badge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(name: "niveau", type: "integer", nullable: false)]
    private ?int $niveau;

    #[ORM\Column(name: "dateAttribution", type: "date", nullable: false)]
    private ?\DateTimeInterface $dateattribution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): static
    {
        $this->niveau = $niveau;
        return $this;
    }

    public function getDateattribution(): ?\DateTimeInterface
    {
        return $this->dateattribution;
    }

    public function setDateattribution(\DateTimeInterface $dateattribution): static
    {
        $this->dateattribution = $dateattribution;
        return $this;
    }
}
