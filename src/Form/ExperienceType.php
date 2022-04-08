<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poste', TextType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('entreprise', TextType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('dateDebut', DateType::class, [
                'widget'=>'single_text',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('dateFin', DateType::class, [
                'widget'=>'single_text',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
