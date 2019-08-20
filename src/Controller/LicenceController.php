<?php

namespace App\Controller;
use App\Entity\Licence;
use App\ExtraClasses\TableJson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

// Include the requires classes of Phpword
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;

class LicenceController extends AbstractController
{
    /**
     * @Route("/home/licences", name="licences")
     */
    public function index(): Response
    {
        $Lus = $this->getDoctrine()
        ->getRepository(Licence::class)
        ->findAll();

        $Licences = new TableJson();
        $arrayLicence=$Licences->construct_table($Lus);

        return new JsonResponse(['cycle'=>$arrayLicence,'type'=>'licence']);
       
    }

     /**
     * @Route("/home/licences/contrat/{titre}", name="contrat_licence")
     */
    public function download($titre) 
    {
        $templateProcessor = new TemplateProcessor('contrats/contrat_formation.docx');

        $templateProcessor->setValue('intitule',$titre);

        $templateProcessor->setValue('cycle','Licence Universitaire Specialisé (LUS)');

        $fileName='contrats/contrat_formation_modifie.docx';  

       

        // Write in the temporal filepath
        $templateProcessor->saveAs($fileName);

        return $this->file($fileName);

       // return $this->json(['cycle'=>$arrayMaster,'type'=>'master']);
       
    }

    /**
     * @Route("/home/licences/descriptif/{titre}", name="descriptif_licence")
     */
    public function descriptif($titre) 
    {
        

        $fileName='admin/descriptifs/L/'.$titre;  

       

        

        return new BinaryFileResponse($fileName);

       // return $this->json(['cycle'=>$arrayMaster,'type'=>'master']);
       
    }
}
