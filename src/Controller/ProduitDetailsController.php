<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Produit;
use App\Form\AvisProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitDetailsController extends AbstractController
{
    #[Route('/produit/details', name: 'app_produit_details')]
    public function index(): Response
    {



        return $this->render('produit_details/index.html.twig', [
            
        ]);
    }

    #[Route('/produit/details/{id}',name:'app_produit_id')]

    public function ProduitDetailsId(ManagerRegistry $doctrine,Produit $id,Request $request, EntityManagerInterface $entityManager):Response{
        


        
        $avis= new Avis();
        
        $form = $this->createForm(AvisProduitType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            
            

            $entityManager->persist($avis);
            $entityManager->flush();
      
        }


        $em=$doctrine->getManager();
        $rep=$em->getRepository(Avis::class);
        $arrayAvis=$rep->findAll();
        

        return $this->render('produit_details/index.html.twig',[
                'produit'=>$id,
                'AvisForm' => $form->createView(),
                'arrayAvis'=>$arrayAvis
        ],);
    }



    
}
