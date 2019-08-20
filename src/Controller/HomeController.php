<?php

namespace App\Controller;
use App\Entity\Specialite;
use App\Entity\ContratL;
use App\Entity\ContratM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $specialites = $this->getDoctrine()
        ->getRepository(Specialite::class)
        ->findAll();
        return $this->render('base.html.twig', [
            'specialites' => $specialites]);
       
    }

     /**
     * @Route("/home/admin", name="homeAdmin")
     */
    public function indexAdmin()
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

     /**
     * @Route("/home/resp", name="homeResp")
     */
    public function indexResp()
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

    
}
