<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
 
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
 
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');
 
        // on créé 10 users
        
        for ($i = 0; $i < 3; $i++) {
            $user = new User();
           // $user->setNomComplet($faker->name);
            $user->setEmail(sprintf('userdemo%d@example.com', $i));
            $user->setNom(sprintf('nom', $i));
            $user->setPrenom(sprintf('prenom', $i));
            $user->setRoles(["admin"]);
            $pass='userdemo'.$i;
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                $pass
            ));
            $manager->persist($user);
        }
        
 
        $manager->flush();
 
    }
}