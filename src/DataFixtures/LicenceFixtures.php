<?php

namespace App\DataFixtures;

use App\Entity\Licence;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Doctrine\Bundle\FixturesBundle\Fixture;

use App\DataFixtures\ResponsableFixtures;
use App\DataFixtures\SpecialiteFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class LicenceFixtures  extends Fixture implements DependentFixtureInterface
{

    
    public function load(ObjectManager $manager)
    {
       
        
        
        
/*
       
        for ($i=0;$i<8;$i++)
        {
            $licence = new Licence();
            $licence->setTitre('licence'.$i);
            $licence->setCode('codeL'.$i);
            $licence->setEtablissement('etabli'.$i);
            $licence->setDateOuverture('2018/2019');
            $licence->setSpecialite($this->getReference('specialite'.$i));
            $licence->setResponsable($this->getReference('responsable'.$i));
            $manager->persist($licence);
            $manager->flush();
        }
            
       */

        
        
    }

    public function getDependencies()
    {
        return array(
            SpecialiteFixtures::class,
            ResponsableFixtures::class,
        );
    }

    
}
