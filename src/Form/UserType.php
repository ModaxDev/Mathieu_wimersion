<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('email', EmailType::class)
            ->add('numtel', TextType::class)
            ->add('ville', TextType::class)
            ->add('genre', CheckboxType::class,[
                'label'=>'Homme'
            ])
            ->add('age', ChoiceType::class,[
                'choices'=> [
                    '1'=>"1",
                    '2'=>"2",
                    '3'=>"3",
                    '4'=>"4",
                    '5'=>"5",
                    '6'=>"6"
                ],
                'multiple'=>false,
                'label'=>'Age'

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
