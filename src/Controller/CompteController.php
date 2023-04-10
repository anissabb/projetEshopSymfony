<?php

namespace App\Controller;


use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompteController extends AbstractController
{
    #[Route('/compte/{id}', name: 'app_compte')]
    public function index(ManagerRegistry $doctrine,$id): Response
    {

        
        $repository=$doctrine->getManager();
        $rep=$repository->getRepository(User::class);
    
        $user=$rep->find($id);

        
        
      
        

        return $this->render('compte/index.html.twig',[
            'personne'=>$user,
        ]);
    }
}
