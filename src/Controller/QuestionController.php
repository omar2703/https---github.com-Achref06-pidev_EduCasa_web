<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\QuestionType;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Repository\QuestionRepository;
use App\Form\ReponseType;
use App\Repository\ReponseRepository;
class QuestionController extends AbstractController
{
    #[Route('/question', name: 'app_question')]
    public function index(): Response
    {
        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
        ]);
    }

    #[Route('/ajout', name: 'app_ajout')]
    public function addQuestion(Request $request): Response
{



    $question = new Question();
    $form = $this->createForm(QuestionType::class, $question);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Ajouter les réponses à la question
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($question);
        $entityManager->flush();

            // Process the list of responses
        

            // Parse and insert responses into Reponses table
            
                $reponse = new Reponse();
                $reponse->setQuestion($question); // Associate the response with the question
                $reponse->setRep($question->getListeRep());
                $reponse->setStatut(true);
                $entityManager->persist($reponse);
            

            $entityManager->flush();

            
        $this->addFlash('success', 'La question a été ajoutée avec succès.');



        return $this->redirectToRoute('afficherquiz');
    }

    return $this->render('question/ajout.html.twig', [
        'question' => $question, 'f' => $form->createView(), 
    ]);


}



   

    #[Route('/questionlist', name: 'questionlist')]
    public function questionList(QuestionRepository  $rep): Response
    {
       $list=$rep->findAll();
        return $this->render('question/questionlist.html.twig', [
            'list' => $list
        ]);
    }


    
    #[Route('/delete/{id}', name: 'delete')]
    public function delete($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $question = $entityManager->getRepository(Question::class)->find($id);

        if (!$question) {
            throw $this->createNotFoundException(
                'No question found for id '.$id
            );
        }

        // Supprimer la question
        $entityManager->remove($question);
        $entityManager->flush();
       
        return $this->redirectToRoute('afficherquiz');
    }


    #[Route('/modifquestion/{id}', name: 'modifquestion')]
    public function modif( ManagerRegistry $doctrine,
    Request $req , QuestionRepository $rep,$id 
     ): Response
    {
        $em=$doctrine->getManager();
        $question = $rep->find($id); // Retrieve existing Offre entity by ID
    
        if (!$question) {
            throw $this->createNotFoundException(' Question not found');
        }

        $form = $this->createForm(QuestionType::class, $question);


        
        
        $form->handleRequest($req);
        if($form->isSubmitted()){
        
        $em->persist($question);
        $em->flush();
       
        return $this->redirectToRoute('afficherquiz');
        }

        return $this->render('question/modif.html.twig',[
            'f'=>$form->createView(),
        ]);
    }
}
