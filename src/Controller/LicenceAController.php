<?php

namespace App\Controller;
use App\Entity\Licence;
use App\Entity\Master;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MasterType;
use App\Form\LicenceType;
use App\Form\UserType;
use App\Events;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;


class LicenceAController extends AbstractController
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
     * @Route("/home/admin/newL", name="nouvelleL")
     */
    public function new_licence(Request $request,UserPasswordEncoderInterface $passwordEncoder, EventDispatcherInterface $eventDispatcher)
    {
   
        $mus=new Licence();
        $form=$this->createForm(LicenceType::class,$mus);
        $resp=new User();

        $form->handleRequest($request);
      

        $formR=$this->createForm(UserType::class,$resp);
        

        $formR->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
        $this->em->persist($mus);
         $this->em->flush();
         $this->addFlash('success','LUS crée avec succes');
         return $this->redirectToRoute('listeF');


        }

        else if ($formR->isSubmitted() && $formR->isValid())
        {
            //
            
            $resp->setRoles(["resp"]);
            $resp->setPassword($passwordEncoder->encodePassword($resp,  $resp->getPassword()));
        $this->em->persist($resp);
         $this->em->flush();
         //On déclenche l'event
         $event = new GenericEvent($resp);
         $eventDispatcher->dispatch(Events::USER_REGISTERED, $event);
         $this->addFlash('success','Resp crée avec succes, il est dans la liste');
         return $this->redirectToRoute('nouvelleM');


        }
        return $this->render('admin/nouvelleL.html.twig', [
            'form' => $form->createView(),'formR' => $formR->createView()
        ]);
    }

   
     

    /**
     * @Route("/home/admin/editL/{id}", name="editL")
     */
    public function edit_licence(Licence $mas,Request $request,UserPasswordEncoderInterface $passwordEncoder, EventDispatcherInterface $eventDispatcher)
    {
        
        $form=$this->createForm(LicenceType::class,$mas);
        

        $form->handleRequest($request);

        $resp=new User();

        $formR=$this->createForm(UserType::class,$resp);
        

        $formR->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
         $this->em->flush();
         $this->addFlash('success','LUS edité avec succes');

         return $this->redirectToRoute('listeF');


        }

        else if ($formR->isSubmitted() && $formR->isValid())
        {
            $resp->setRoles(["resp"]);
            $resp->setPassword($passwordEncoder->encodePassword($resp,  $resp->getPassword()));
        $this->em->persist($resp);
         $this->em->flush();
         $event = new GenericEvent($resp);
         $eventDispatcher->dispatch(Events::USER_REGISTERED, $event);
         $this->addFlash('success','Resp crée avec succes, il est dans la liste');
         return $this->redirectToRoute('nouvelleM');


        }
       
        return $this->render('admin/editL.html.twig', [
            'form' => $form->createView(),'formR' => $formR->createView()
        ]);
    }


     /**
     * @Route("/home/admin/deleteL/{id}", name="deleteL")
     */
    public function delete_licence(Licence $mas)
    {
        
        $this->em->remove($mas);
         $this->em->flush();
         $this->addFlash('success','LUS supprimée avec suces');
         return $this->redirectToRoute('listeF');


        
    }

     /**
     * @Route("/home/admin/newC", name="nouvelleC")
     */
    public function new_contract()
    {
        return $this->render('admin/nouvelleC.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/home/admin/listF", name="listeF")
     */
    public function liste_formations()
    {

        $Lus = $this->getDoctrine()
        ->getRepository(Licence::class)
        ->findAll();

        $Mus = $this->getDoctrine()
        ->getRepository(Master::class)
        ->findAll();


        return $this->render('admin/listeF.html.twig', [
            'masters' => $Mus, 'licences' => $Lus
        ]);
    }

    
}
