<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Responsable;
use App\Events;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Doctrine\Common\Persistence\ObjectManager;

class SecurityController extends AbstractController
{
    /**
     * @Route("/home/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils,Request $request): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

       // $type= $request->get('type'); 



        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()    
    {
         // Your logout logic
      
 
         return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/admin/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EventDispatcherInterface $eventDispatcher): Response
    {
        $resp = $this->getDoctrine()
        ->getRepository(User::class)
        ->findAll();
        if ($request->isMethod('POST')) {
            $user = new User();
            $user->setNom($request->request->get('nom'));
            $user->setPrenom($request->request->get('prenom'));
            $user->setEmail($request->request->get('email'));
            $role=array($request->request->get('roles'));
            
            //$res=array();
            $user->setRoles( $role);
            
           // $user->setNomComplet($request->request->get('nomComplet'));
            $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('password')));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $user->setPassword($request->request->get('password'));

            //On déclenche l'event
            $event = new GenericEvent($user);
            $eventDispatcher->dispatch(Events::USER_REGISTERED, $event);

            $this->addFlash('success','Utilisateur crée avec succes');

            return $this->redirectToRoute('app_register');
        }
        return $this->render('admin/register.html.twig',['listR' => $resp]);
    }
   
/**
     * @Route("/reset_password", name="app_reset_password")
     */
    public function resetPassword(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
 
        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();
 
            //$user = $entityManager->getRepository(User::class)->findOneByResetToken($token);
            /* @var $user User */
 
            $user = $this->getUser();
 
            //$user->setResetToken(null);
            $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('password')));

            $user->setEmail($request->request->get('email'));
            $entityManager->flush();
 
            $this->addFlash('notice', 'Mot de passe mis à jour');
 
            
        }
 
            return $this->render('security/reset_password.html.twig');
        
    
   
}
}

?>