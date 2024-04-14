<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuizRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(name: "nom", type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank]
    private ?string $nom;

    #[ORM\Column(name: "nbQuest", type: "integer", nullable: false)]
    #[Assert\NotBlank]
    private ?int $nbQuest;

    #[ORM\Column(name: "note", type: "integer", nullable: false)]
    #[Assert\NotBlank]
    private ?int $note;

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

    public function getNbQuest(): ?int
    {
        return $this->nbQuest;
    }

    public function setNbQuest(int $nbQuest): static
    {
        $this->nbQuest = $nbQuest;
        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;
        return $this;
    }

    #[Assert\Callback]
    public function validateNoteLessThanNbQuest(ExecutionContextInterface $context): void
    {
        if ($this->note >= $this->nbQuest) {
            $context->buildViolation("La note doit être inférieure au nombre de questions.")
                ->atPath('note')
                ->addViolation();
        }
    }
}
