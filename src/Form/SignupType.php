<?php

namespace App\Form;

use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Email')
            ->add('Nom')
            ->add('Prenom')
            ->add('Numtel')
            ->add('Roles',ChoiceType::class, [
                'choices' => [
                    'Admin' => 'admin',
                    'Proprietaire' => 'proprietaire',
                    'Voyageur' => 'voyageur',
                ],
                'expanded' => true
            ])
            ->add('password')
            ->add('ajouter',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
