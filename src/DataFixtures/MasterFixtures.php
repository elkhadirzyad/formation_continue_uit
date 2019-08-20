<?php

namespace App\DataFixtures;

use App\Entity\Master;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Doctrine\Bundle\FixturesBundle\Fixture;

use App\DataFixtures\ResponsableFixtures;
use App\DataFixtures\SpecialiteFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MasterFixtures  extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /*
        for ($i=0;$i<8;$i++)
        {
            $licence = new Master();
            $licence->setTitre('master'.$i);
            $licence->setCode('codeM'.$i);
            $licence->setEtablissement('etabli'.$i);
            $licence->setDateOuverture('2018/2019');
            $licence->setSpecialite($this->getReference('specialite'.(7-$i)));
            $licence->setResponsable($this->getReference('responsable'.(7-$i)));
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
