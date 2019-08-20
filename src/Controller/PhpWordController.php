<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
// Include the requires classes of Phpword
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;

class PhpWordController extends AbstractController
{
    /**
     * @Route("/phpword", name="phpword")
     */
    public function index()
    {

        
        
        $templateProcessor = new TemplateProcessor('hello_world.docx');

        $templateProcessor->setValue('myReplacedValue','nice 3');

        $fileName='hello_world2.docx';  

       

        // Write in the temporal filepath
        $templateProcessor->saveAs($fileName);

        // Send the temporal file as response (as an attachment)
        

        

        

        //return new Response("File succesfully written at $fileName");

        return $this->file($fileName);
       
    }
}
