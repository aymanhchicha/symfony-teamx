<?php

namespace App\Form;

use App\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom',TextType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholser'=>'prenom'
                ]

            ])
            ->add('nom',TextType::class,[
                    'required'=>false,
                    'label'=>false,
                    'attr'=>[
                        'placeholser'=>'E-mail'
                    ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'=> Search::class,
            'methode'=>'get',
            'crsf_protection'=> false,



        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}
