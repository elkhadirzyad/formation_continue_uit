<?php

namespace App\Form;

use App\Entity\Licence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LicenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('code')
            ->add('etablissement',ChoiceType::class, array(
                'choices'  => array(
                    'FS' => 'FS',
                    'ENCG' => 'ENCG',
                    'ENSA' => 'ENSA',
                    'FSJES' =>  'FSJES',
                ),
            ))
            ->add('dateouverture')
            ->add('descripFileL', FileType::class,['label' => 'Descriptif','required' => false])
            ->add('specialite', null, ['choice_label' => 'titre'])
            ->add('user', EntityType::class,['label'=>'Responsable','class' => 'App\Entity\User',
            
               
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ig')
                      ->where('ig.roles LIKE :n')
                      ->setParameter('n', '%"'.'resp'.'"%')
                      ->orderBy('ig.nom', 'ASC');
                },
                'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Licence::class,
        ]);
    }
}
