<?php

namespace App\Controller;
use App\Entity\Master;
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

class MasterController extends AbstractController
{
    /**
     * @Route("/home/masters", name="masters")
     */
    public function index()
    {
        $Mus = $this->getDoctrine()
        ->getRepository(Master::class)
        ->findAll();

        $Masters = new TableJson();
        $arrayMaster=$Masters->construct_table($Mus);

        return new JsonResponse(['cycle'=>$arrayMaster,'type'=>'master']);
       
    }
    /**
     * @Route("/home/masters/contrat/{titre}", name="contrat_master")
     */
    public function download($titre) 
    {
        $templateProcessor = new TemplateProcessor('contrats/contrat_formation.docx');

        $templateProcessor->setValue('intitule',$titre);

        $templateProcessor->setValue('cycle','Master Universitaire Specialisé (MUS)');

        $fileName='contrats/contrat_formation_modifie.docx';  

       

        // Write in the temporal filepath
        $templateProcessor->saveAs($fileName);

        return $this->file($fileName);

       // return $this->json(['cycle'=>$arrayMaster,'type'=>'master']);
       
    }

     /**
     * @Route("/home/masters/descriptif/{titre}", name="descriptif_master")
     */
    public function descriptifM($titre) 
    {
        

        $fileName='admin/descriptifs/M/'.$titre;  

       

        

        return new BinaryFileResponse($fileName);

       // return $this->json(['cycle'=>$arrayMaster,'type'=>'master']);
       
    }

   
    }

