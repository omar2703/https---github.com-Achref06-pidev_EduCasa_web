<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\QuizType;
use App\Entity\Quiz;
use App\Repository\QuizRepository;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Repository\ReponseRepository;
class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(): Response
    {
        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizController',
        ]);
    }

    #[Route('/ajoutquiz', name: 'ajoutquiz')]
    public function ajout( ManagerRegistry $doctrine,
    Request $req 
     ): Response
    {
        $em=$doctrine->getManager();
        $quiz=new Quiz();
        $form=$this->createForm(QuizType::class,$quiz);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
        
        $em->persist($quiz);
        $em->flush();
       
        return $this->redirectToRoute('afficherquiz');
        }

        return $this->render('quiz/ajout.html.twig',[
            'f'=>$form->createView(),
        ]);
    }


    #[Route('/deletequiz/{id}', name: 'app_delete')]
    public function delete($id,QuizRepository $rep, ManagerRegistry $doctrine 
     ): Response
    {
        $em=$doctrine->getManager();
        $quiz=$rep->find($id);
        $em->remove($quiz);
        $em->flush();
       
        return $this->redirectToRoute('afficherquiz');
    }

    #[Route('/modifquiz/{id}', name: 'app_modif')]
    public function modif( ManagerRegistry $doctrine,
    Request $req , QuizRepository $rep,$id 
     ): Response
    {
        $em=$doctrine->getManager();
        $quiz = $rep->find($id); // Retrieve existing Offre entity by ID
    
        if (!$quiz) {
            throw $this->createNotFoundException(' quiz not found');
        }

        $form = $this->createForm(QuizType::class, $quiz);


        
        
        $form->handleRequest($req);
        if($form->isSubmitted()){
        
        $em->persist($quiz);
        $em->flush();
       
        return $this->redirectToRoute('afficherquiz');
        }

        return $this->render('quiz/modif.html.twig',[
            'f'=>$form->createView(),
        ]);
    }

    #[Route('/quiz/{id}', name: 'quiz_show')]
    public function show(Quiz $quiz, ReponseRepository $reponseRepository): Response
    {
        // Récupérer les questions associées à ce quiz depuis la base de données
        $questions = $this->getDoctrine()->getRepository(Question::class)->findBy(['quiz' => $quiz]);
        $reponses = [];
    foreach ($questions as $question) {
        $reponses[$question->getId()] = $reponseRepository->findBy(['question' => $question]);
    }
        // Passer les questions au modèle Twig pour affichage
        return $this->render('quiz/show.html.twig', [
            'quiz' => $quiz,
            'questions' => $questions,
            'reponses' => $reponses,
        ]);
    }

}
