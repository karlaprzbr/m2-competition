<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('titre')
            ->add('description')
            ->add('dispo', DateType::class, [
                'widget'=>'single_text'
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
            ->add('experience')
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
            ->add('workView', ChoiceType::class, [
                'choices'=>[
                    'test1'=>'test1',
                    'test2'=>'test2',
                ],
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('companyValues', ChoiceType::class, [
                'choices'=>[
                    'RSE'=>'RSE',
                    'Bien-être au travail'=>'Bien-être au travail',
                ],
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('teamSpirit', ChoiceType::class, [
                'choices'=>[
                    'coopération'=>'coopération',
                    'after work'=>'after work',
                ],
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('salaire')
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
