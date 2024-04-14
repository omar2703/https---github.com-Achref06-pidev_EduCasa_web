<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AbonnementRepository;
use App\Repository\QuizRepository; 
use App\Repository\QuestionRepository; 
use App\Repository\UserRepository; 
use App\Repository\FormationRepository; 
use App\Repository\ReponseRepository;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\Quiz;

class AbonnementController extends AbstractController
{
    #[Route('/abonnement', name: 'app_abonnement')]
    public function index(): Response
    {
        return $this->render('abonnement/index.html.twig', [
            'controller_name' => 'AbonnementController',
        ]);
    }

    #[Route('/offrelist', name: 'offrelist')]
    public function authorList(AbonnementRepository  $rep): Response
    {
       $offrelist=$rep->findAll();
        return $this->render('abonnement/display.html.twig', [
            'offrelist' => $offrelist
        ]);
    }


    #[Route('/afficheroffre', name: 'afficheroffre')]
    public function offreList(AbonnementRepository  $rep): Response
    {
       $offrelist=$rep->findAll();
        return $this->render('abonnement/afficheroffre.html.twig', [
            'offrelist' => $offrelist
        ]);
    }

    #[Route('/afficherquiz', name: 'afficherquiz')]
    public function quizList(QuizRepository  $rep,QuestionRepository  $rep1, ReponseRepository $rep2): Response
    {
       $quizlist=$rep->findAll();
       $questionlist=$rep1->findAll();

       $reponselist=$rep2->findAll();
        return $this->render('abonnement/afficherquiz.html.twig', [
            'quizlist' => $quizlist, 'questionlist' => $questionlist, 'reponselist' => $reponselist
        ]);
    }


    #[Route('/afficheruser', name: 'afficheruser')]
    public function userList(UserRepository  $rep): Response
    {
       $userlist=$rep->findAll();
        return $this->render('abonnement/afficheruser.html.twig', [
            'userlist' => $userlist
        ]);
    }

    #[Route('/afficherformation', name: 'afficherformation')]
    public function formationList(FormationRepository  $rep): Response
    {
       $formationlist=$rep->findAll();
        return $this->render('abonnement/afficherformation.html.twig', [
            'formationlist' => $formationlist
        ]);
    }


    #[Route('/accueil', name: 'accueil')]
    public function formationListe(): Response
    {
       
        return $this->render('accueil.html.twig', [
            
        ]);
    }
    
    #[Route('/front', name: 'front')]
    public function front(): Response
    {
       
        return $this->render('front.html.twig', [
            
        ]);
    }

    
    
    
}
