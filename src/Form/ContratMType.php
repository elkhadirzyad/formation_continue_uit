<?php

namespace App\Form;

use App\Entity\ContratM;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ContratMType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom',null, [
            'required'   => true,
            
        ])
        ->add('prenom',null, [
            'required'   => true,
            
        ])

        ->add('etat',ChoiceType::class, array(
            'choices'  => array(
                'complete' => 'complete',
                'incomplete' => 'incomplete',
               
            ),
        ))
            
            
            ->add('master', null, ['choice_label' => 'titre','required'   => true])

            ->add('description', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    //...
                ),
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContratM::class,
        ]);
    }
}
