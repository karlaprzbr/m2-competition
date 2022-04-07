<?php

namespace App\Form;

use App\Entity\Offre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
            ->add('datePublication', DateType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ],
                'widget'=>'single_text'
            ])
            ->add('dateDebut', DateType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ],
                'widget'=>'single_text'
            ])
            ->add('typeContrat', ChoiceType::class, [
                'choices'=>[
                    'CDI'=>'CDI',
                    'CDD'=>'CDD',
                    'Intérim'=>'Intérim'
                ],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('niveauDiplome', ChoiceType::class, [
                'choices'=>[
                    'CAP, BEP'=>3,
                    'Baccaleuréat, Bac Pro, BP'=>4,
                    'BTS, DUT, DEUG, DEUST'=>5,
                    'Licence, LP, Bachelor'=>6,
                    'Master, Dipôme d\'ingénieur'=>7,
                    'Doctorat'=>8
                ],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('experience', NumberType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('softSkills', ChoiceType::class, [
                'choices'=>[
                    'créativité'=>'créativité',
                    'esprit d\'équipe'=>'esprit d\'équipe',
                    'empathie'=>'empathie',
                    'confiance'=>'confiance',
                    'communication'=>'communication',
                    'creation'=>'creation',
                    'gestion du temps'=>'gestion du temps',
                    'audace'=>'audace',
                    'gestion du stress'=>'gestion du stress',
                    'adaptabilité'=>'adaptabilité',
                    'dynamisme'=>'dynamisme',
                    'leadership'=>'leadership',
                    'développement personnel'=>'développement personnel',
                    'curiosité'=>'curiosité',
                    'flexibilité'=>'flexibilité',
                    'bienveillance'=>'bienveillance',
                    'entreprenant'=>'entreprenant',
                    'aisance relationnelle'=>'aisance relationnelle',
                    'autonomie'=>'autonomie',
                    'esprit critique'=>'esprit critique',
                    'organisation'=>'organisation',
                    'optimisme'=>'optimisme',
                    'motivation'=>'motivation',
                    'humilité'=>'humilité',
                ],
                'multiple'=>true,
                'expanded'=>true,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('hardSkills', ChoiceType::class, [
                'choices'=>[
                    'réseaux sociaux'=>'réseaux sociaux',
                    'référencement'=>'référencement',
                    'anglais'=>'anglais',
                    'étude marketing'=>'étude marketing',
                    'création web'=>'création web',
                    'JavaScript'=>'JavaScript',
                    'PHP'=>'PHP',
                    'SQL'=>'SQL',
                    'français'=>'français',
                    'Python'=>'Python',
                    'DataStudio'=>'DataStudio',
                    'Google Ads'=>'Google Ads',
                    'Facebook Ads'=>'Facebook Ads',
                    'Instagram'=>'Instagram',
                    'Twitter'=>'Twitter',
                    'DataViz'=>'DataViz',
                    'Big Data'=>'Big Data',
                    'Machine Learning'=>'Machine Learning',
                    'Python'=>'Python',
                    'Java'=>'Java',
                    'R'=>'R',
                    'appel d\'offre'=>'appel d\'offre',
                    'suivi client'=>'suivi client',
                    'analyse technique'=>'analyse technique',
                    'SEO'=>'SEO',
                    'SEA'=>'SEA',
                    'Semrush'=>'Semrush',
                ],
                'multiple'=>true,
                'expanded'=>true,
            ])
            ->add('localisation', TextType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('salaire', TextType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            // ->add('entreprise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
