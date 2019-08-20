<?php

namespace App\Controller;
use App\Entity\ContratL;
use App\Entity\ContratM;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContratLType;
use App\Form\ContratMType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;


class ContratController extends AbstractController
{
   
    /**
     * @var ObjectManager
     */
    private  $em;

    public function __construct(ObjectManager $em)
    {
        $this->em=$em;
    }
   
    /**
     * @Route("/home/admin/newCL", name="nouvelleCL")
     */
    public function new_contractL(Request $request)
    {
        $mus=new ContratL();
        $form=$this->createForm(ContratLType::class,$mus);
        

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
        $this->em->persist($mus);
         $this->em->flush();
         $this->addFlash('success','Contrat LUS crée avec succes');
         return $this->redirectToRoute('listeC');


        }
        return $this->render('admin/nouvelleCL.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/home/admin/editCL/{id}", name="editCL")
     */
    public function edit_contratL(ContratL $mas,Request $request)
    {
        
        $form=$this->createForm(ContratLType::class,$mas);
        

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
         $this->em->flush();
         $this->addFlash('success','Contrat LUS editée avec succes');
         return $this->redirectToRoute('listeC');


        }
       
        return $this->render('admin/editCL.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/home/admin/deleteCL/{id}", name="deleteCL")
     */
    public function delete_contratL(ContratL $mas)
    {
        
        


        $this->em->remove($mas);
        $this->em->flush();
        $this->addFlash('success','Contrat LUS supprimée avec succes');
        return $this->redirectToRoute('listeC');
    }

    /**
     * @Route("/home/admin/newCM", name="nouvelleCM")
     */
    public function new_contractM(Request $request)
    {
        $mus=new ContratM();
        $form=$this->createForm(ContratMType::class,$mus);
        

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
        $this->em->persist($mus);
         $this->em->flush();
         $this->addFlash('success','Contrat MUS crée avec succes');
         return $this->redirectToRoute('listeC');


        }
        return $this->render('admin/nouvelleCM.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/home/admin/editCM/{id}", name="editCM")
     */
    public function edit_contratM(ContratM $mas,Request $request)
    {
        
        $form=$this->createForm(ContratMType::class,$mas);
        

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
         $this->em->flush();
         $this->addFlash('success','Contrat LUS editée avec succes');
         return $this->redirectToRoute('listeC');


        }
       
        return $this->render('admin/editCM.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
     /**
     * @Route("/home/admin/deleteCM/{id}", name="deleteCM")
     */
    public function delete_contratM(ContratM $mas)
    {
        
        


        $this->em->remove($mas);
        $this->em->flush();
        $this->addFlash('success','Contrat MUS supprimée avec succes');
        return $this->redirectToRoute('listeC');
    }

    /**
     * @Route("/home/admin/listC", name="listeC")
     */
    public function liste_contracts()
    {
        $Lus = $this->getDoctrine()
        ->getRepository(ContratL::class)
        ->findAll();

        $Mus = $this->getDoctrine()
        ->getRepository(ContratM::class)
        ->findAll();


        return $this->render('admin/listeC.html.twig', [
            'masters' => $Mus, 'licences' => $Lus
        ]);
    }
}
