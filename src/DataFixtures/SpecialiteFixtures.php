<?php

namespace App\DataFixtures;

use App\Entity\Specialite;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SpecialiteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*
        // create 10 specialites! Bam!
           for ($i=0;$i<8;$i++)
           {
            $specialite = new Specialite();
            $specialite->setTitre('Gestion-Finance -Banque'.$i);
            
            $manager->persist($specialite);
            $manager->flush();
            $this->addReference('specialite'.$i, $specialite);
           }
          */  
       

       
    }

    
}
