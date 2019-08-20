<?php

namespace App\Controller;




use App\Entity\ContratL;
use App\Entity\ContratM;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class RespController extends AbstractController
{
    /**
     * @Route("home/resp/contrats", name="listeCR")
     */
    public function contrats()
    {

       

        $user = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $Lus = $this->getDoctrine()
        ->getRepository(ContratL::class)
        ->findContratUser($user);

        $Mus = $this->getDoctrine()
        ->getRepository(ContratM::class)
        ->findContratUser($user);


        return $this->render('resp/listeCR.html.twig', [
            'masters' => $Mus, 'licences' => $Lus
        ]);

         
        
    }

     /**
     * @Route("home/resp/calendar", name="calendar")
     */
    public function calendar() 
    {
        

        return $this->render('calendar/calendar.html.twig');

       // return $this->json(['cycle'=>$arrayMaster,'type'=>'master']);
       
    }
}
