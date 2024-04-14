<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $numr;

    #[ORM\Column(name: "description", type: "text", length: 65535, nullable: false)]
    private ?string $description;

    #[ORM\Column(name: "type", type: "string", length: 255, nullable: false)]
    private ?string $type;

    #[ORM\Column(name: "date", type: "date", nullable: false)]
    private ?\DateTimeInterface $date;

    public function getNumr(): ?int
    {
        return $this->numr;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }
}
