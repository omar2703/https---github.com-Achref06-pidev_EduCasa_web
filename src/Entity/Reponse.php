<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReponseRepository;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: "Question")]
    #[ORM\JoinColumn(name: "idq", referencedColumnName: "id")]
    private $question;

    #[ORM\Column(name: "rep", type: "string", length: 255, nullable: false)]
    private ?string $rep;

    #[ORM\Column(name: "statut", type: "boolean", nullable: false)]
    private ?bool $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): static
    {
        $this->question = $question;
        return $this;
    }

    public function getRep(): ?string
    {
        return $this->rep;
    }

    public function setRep(string $rep): static
    {
        $this->rep = $rep;
        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;
        return $this;
    }
}