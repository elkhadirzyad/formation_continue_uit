<?php 

namespace App\ExtraClasses;
use App\Entity\Specialite;



class TableJson
{

    public $array=array();  	


function construct_table(array $table)
 
{
 
    foreach($table  as $item)
     {
        $this->array[] = array(
          'id' => $item->getId(),
         'titre' => $item->getTitre(),
         'Responsable' => ($item->getUser())->getNom(),
         'Code' => $item->getCode(),
         'Etab' => $item->getEtablissement(),
         'desc' => $item->getDescriptif(),
         'annee' => $item->getDateOuverture(),


     // ... Same for each property you want
       );
      }
      return $this->array;
 
}


}

?>