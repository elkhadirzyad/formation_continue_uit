<?php

namespace App\Controller;

use App\Entity\Master;
use App\Entity\Licence;
use App\ExtraClasses\TableJson;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SpecialiteController extends AbstractController
{
    /**
     * @Route("home/specialite/{id}", name="specialite_lus_mus")
     */
    public function index($id)
    {

       


        $Lus = $this->getDoctrine()
        ->getRepository(Licence::class)
        ->findBySpecialite($id);

        $Licences = new TableJson();
        $arrayLicence=$Licences->construct_table($Lus);

        

        $Mus = $this->getDoctrine()
        ->getRepository(Master::class)
        ->findBySpecialite($id);

        

        $Masters = new TableJson();
        $arrayMaster=$Masters->construct_table($Mus);

         $var="here"; 


          return  new JsonResponse(array('master'=>$arrayMaster, 'licence'=>$arrayLicence, 'var'=>$var));

         
        
    }
}
