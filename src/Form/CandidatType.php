<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('titre', TextType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('dispo', DateType::class, [
                'widget'=>'single_text',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('typeContrat', ChoiceType::class, [
                'choices'=>[
                    'CDI'=>'CDI',
                    'CDD'=>'CDD',
                    'Intérim'=>'Intérim'
                ],
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('experience', NumberType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            // ->add('competences')
            ->add('softSkills', ChoiceType::class, [
                'choices'=>[
                    'empathie'=>'empathie',
                    'communication'=>'communication',
                    'créativité'=>'créativité',
                    'audace'=>'audace',
                    'curiosité'=>'curiosité'
                ],
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('hardSkills', ChoiceType::class, [
                'choices'=>[
                    'Symfony'=>'Symfony',
                    'CodeIgniter'=>'CodeIgniter',
                    'Git'=>'Git',
                    'React'=>'React',
                    'Java'=>'Java'
                ],
                'multiple'=>true,
                'expanded'=>true
            ])
            // ->add('workView', ChoiceType::class, [
            //     'choices'=>[
            //         'test1'=>'test1',
            //         'test2'=>'test2',
            //     ],
            //     'multiple'=>true,
            //     'expanded'=>true
            // ])
            // ->add('companyValues', ChoiceType::class, [
            //     'choices'=>[
            //         'RSE'=>'RSE',
            //         'Bien-être au travail'=>'Bien-être au travail',
            //     ],
            //     'multiple'=>true,
            //     'expanded'=>true
            // ])
            // ->add('teamSpirit', ChoiceType::class, [
            //     'choices'=>[
            //         'coopération'=>'coopération',
            //         'after work'=>'after work',
            //     ],
            //     'multiple'=>true,
            //     'expanded'=>true
            // ])
            ->add('salaire', NumberType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
