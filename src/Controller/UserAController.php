<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Responsable;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;



class UserAController extends AbstractController
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
     * @Route("/home/admin/listR", name="listR")
     */
    public function listelogedusers()
    {
       
        $Lus = $this->getDoctrine()
        ->getRepository(User::class)
        ->findResp();

        $Ad = $this->getDoctrine()
        ->getRepository(User::class)
        ->findAdmin($this->get('security.token_storage')->getToken()->getUser()->getEmail());


        return $this->render('admin/listeR.html.twig', [
            'spts' => $Ad, 'resp' => $Lus
        ]);
    }
   
    
    
   
     /**
     * @Route("/home/admin/editU/{id}", name="editU")
     */
    public function edit_user(Request $request)
    {
        /*
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
        */
    }

     /**
     * @Route("/home/admin/deleteU/{id}", name="deleteU")
     */
    public function deleteu(User $mas)
    {
        
        $this->em->remove($mas);
         $this->em->flush();
         $this->addFlash('success','Utilisateur supprimé avec succes');
         return $this->redirectToRoute('listR');
        

        
    }


   
}
