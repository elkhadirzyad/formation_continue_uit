<?php

namespace App\Controller;
use App\Entity\Licence;
use App\Entity\Master;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MasterType;
use App\Form\LicenceType;
use App\Form\ResponsableType;
use App\Form\UserType;
use App\Events;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;


class MasterAController extends AbstractController
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
     * @Route("/home/admin/newM", name="nouvelleM")
     */
    public function new_master(Request $request,UserPasswordEncoderInterface $passwordEncoder,  EventDispatcherInterface $eventDispatcher)
    {
   
        $mus=new Master();
        $form=$this->createForm(MasterType::class,$mus);
        $resp=new User();

        $form->handleRequest($request);
      

        $formR=$this->createForm(UserType::class,$resp);
        

        $formR->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
        $this->em->persist($mus);
         $this->em->flush();
         $this->addFlash('success','MUS crée avec succes');
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
        return $this->render('admin/nouvelleM.html.twig', [
            'form' => $form->createView(),'formR' => $formR->createView()
        ]);
    }

    

    /**
     * @Route("/home/admin/editM/{id}", name="editM")
     */
    public function edit_master(Master $mas,Request $request,UserPasswordEncoderInterface $passwordEncoder, EventDispatcherInterface $eventDispatcher)
    {
        
        $form=$this->createForm(MasterType::class,$mas);
        

        $form->handleRequest($request);

        $resp=new User();

        $formR=$this->createForm(UserType::class,$resp);
        

        $formR->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
           // $this->em->persist($mas);
         $this->em->flush();
         $this->addFlash('success','MUS edité avec succes');

         return $this->redirectToRoute('listeF');


        }

        else if ($formR->isSubmitted() && $formR->isValid())
        {
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
       
        return $this->render('admin/editM.html.twig', [
            'form' => $form->createView(),'formR' => $formR->createView()
        ]);
    }

     /**
     * @Route("/home/admin/deleteM/{id}", name="deleteM")
     */
    public function delete_master(Master $mas)
    {
        
        $this->em->remove($mas);
         $this->em->flush();
         $this->addFlash('success','MUS supprimée avec succes');
         return $this->redirectToRoute('listeF');


        
    }

    
    

   
}
