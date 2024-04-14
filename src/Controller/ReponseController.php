<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\ReponseType;
use App\Entity\Reponse;
use App\Repository\ReponseRepository;


class ReponseController extends AbstractController
{
    #[Route('/reponse', name: 'app_reponse')]
    public function index(): Response
    {
        return $this->render('reponse/index.html.twig', [
            'controller_name' => 'ReponseController',
        ]);
    }


    #[Route('/ajoutrep', name: 'ajoutrep')]
    public function ajout( ManagerRegistry $doctrine,
    Request $req 
     ): Response
    {
        $em=$doctrine->getManager();
        $reponse=new Reponse();
        $form=$this->createForm(ReponseType::class,$reponse);
        $form->handleRequest($req);
        if($form->isSubmitted()){
        $em->persist($reponse);
        $em->flush();
       
        return $this->redirectToRoute('afficherquiz');
        }

        return $this->render('reponse/ajout.html.twig',[
            'f'=>$form->createView(),
        ]);
    }


    #[Route('/deleterep/{id}', name: 'deleterep')]
    public function delete($id,ReponseRepository $rep, ManagerRegistry $doctrine 
     ): Response
    {
        $em=$doctrine->getManager();
        $reponse=$rep->find($id);
        $em->remove($reponse);
        $em->flush();
       
        return $this->redirectToRoute('afficherquiz');
    }

    #[Route('/modifrep/{id}', name: 'modifrep')]
    public function modif( ManagerRegistry $doctrine,
    Request $req , ReponseRepository $rep,$id 
     ): Response
    {
        $em=$doctrine->getManager();
        $reponse = $rep->find($id); // Retrieve existing Offre entity by ID
    
        if (!$reponse) {
            throw $this->createNotFoundException(' reponse not found');
        }

        $form = $this->createForm(ReponseType::class, $reponse);


        
        
        $form->handleRequest($req);
        if($form->isSubmitted()){
        
        $em->persist($reponse);
        $em->flush();
       
        return $this->redirectToRoute('afficherquiz');
        }

        return $this->render('reponse/modif.html.twig',[
            'f'=>$form->createView(),
        ]);
    }
}
