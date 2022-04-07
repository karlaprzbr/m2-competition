<?php

namespace App\Form;

use App\Entity\Diplome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiplomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('niveau', ChoiceType::class, [
                'choices'=>[
                    'CAP, BEP'=>3,
                    'Baccaleuréat, Bac Pro, BP'=>4,
                    'BTS, DUT, DEUG, DEUST'=>5,
                    'Licence, LP, Bachelor'=>6,
                    'Master, Dipôme d\'ingénieur'=>7,
                    'Doctorat'=>8
                ]
            ])
            ->add('titre')
            ->add('description')
            ->add('dateDebut', DateType::class, [
                'widget'=>'single_text'
            ])
            ->add('dateFin', DateType::class, [
                'widget'=>'single_text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Diplome::class,
        ]);
    }
}
