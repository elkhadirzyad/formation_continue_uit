<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('password')
            ->add('roles',ChoiceType::class, array(
                'choices' => [
                    'Admin' => 'ROLE_ADMIN',
                    'Super' => 'ROLE_SUPER_ADMIN',
                ], 'expanded'  => false,  'multiple'  => true,
            ))
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
