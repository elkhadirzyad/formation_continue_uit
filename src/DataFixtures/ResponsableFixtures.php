<?php

namespace App\DataFixtures;
use App\Entity\Responsable;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ResponsableFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*
       // create 10 responsables! Bam!
       for ($i=0;$i<8;$i++)
           {
        $resp= new Responsable();
        $resp->setNom('nom'.$i);
        $resp->setPrenom('prenom'.$i);
        $manager->persist($resp);
        $manager->flush();
        $this->addReference('responsable'.$i, $resp);
           }
           */

    
    }
   
}
