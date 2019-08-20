<?php

namespace App\Controller;
use App\Entity\Specialite;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SpecialiteType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;



class SpecialiteAController extends AbstractController
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
     * @Route("/home/admin/newS", name="nouvelleS")
     */
    public function new_s(Request $request)
    {

        $s=new Specialite();
        $form=$this->createForm(SpecialiteType::class,$s);
        

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
        $this->em->persist($s);
         $this->em->flush();
         $this->addFlash('success','Specialite créee avec succes');
         return $this->redirectToRoute('listeS');


        }
        return $this->render('admin/nouvelleS.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    

    /**
     * @Route("/home/admin/editS/{id}", name="editS")
     */
    public function edit_master(Specialite $mas,Request $request)
    {
        
        $form=$this->createForm(SpecialiteType::class,$mas);
        

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
         $this->em->flush();
         $this->addFlash('success','Specialite edité avec succes');

         return $this->redirectToRoute('listeS');


        }
       
        return $this->render('admin/editS.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/home/admin/deleteS/{id}", name="deleteS")
     */
    public function delete_s(Specialite $mas)
    {
        
        $this->em->remove($mas);
         $this->em->flush();
         $this->addFlash('success','Specialite supprimée avec succes');
         return $this->redirectToRoute('listeS');


        
    }

    /**
     * @Route("/home/admin/listS", name="listeS")
     */
    public function liste_specialites()
    {

        $Lus = $this->getDoctrine()
        ->getRepository(Specialite::class)
        ->findAll();

        


        return $this->render('admin/listeS.html.twig', [
            'spts' => $Lus
        ]);
    }
    

   
}

?>
