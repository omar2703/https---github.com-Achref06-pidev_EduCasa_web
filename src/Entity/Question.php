<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Reponse;
use App\Repository\QuestionRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: "Quiz")]
    #[ORM\JoinColumn(name: "idquiz", referencedColumnName: "id")]
    private $quiz;

    #[ORM\Column(name: "quest", type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank]
    private ?string $quest;

    
    #[ORM\Column(name: "listeRep", type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank]
    private ?string $listeRep;

    #[ORM\OneToMany(targetEntity: Reponse::class, mappedBy: "question", cascade: ["remove"])]
    private Collection $reponses;


    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
    }

    public function addReponse(Reponse $reponse)
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setQuestion($this);
        }

        return $this;
    }
    public function removeReponse(Reponse $reponse)
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getQuestion() === $this) {
                $reponse->setQuestion(null);
            }
        }

        return $this;
    }
    



    public function getListeRep(): ?string
    {
        return $this->listeRep;
    }

    public function setListeRep(string $listeRep): static
    {
        $this->listeRep = $listeRep;
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz): static
    {
        $this->quiz = $quiz;

        return $this;
    }

    public function getQuest(): ?string
    {
        return $this->quest;
    }

    public function setQuest(string $quest): static
    {
        $this->quest = $quest;
        return $this;
    }

   
}
