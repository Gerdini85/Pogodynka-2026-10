<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', null, [
                'attr' => [
                    'placeholder' => 'Proszę wprowadzić nazwę miasta.',
                ]
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Poland' => 'PL',
                    'Germany' => 'DE',
                    'France' => 'FR',
                    'Spain' => 'ES',
                    'Italy' => 'IT',
                    'United Kingdom' => 'GB',
                    'United States' => 'US',
                ]
            ])
            ->add('latitude', NumberType::class, [
                'html5' => true,
                'label' => 'Latitude',
                'scale' => 5,
                'attr' => [
                    'min' => -90,
                    'max' => 90,
                    'step' => 0.0001,
                ]
            ])
            ->add('longitude', NumberType::class, [
                'html5' => true,
                'label' => 'Longitude',
                'scale' => 7,
                'attr' => [
                    'min' => -190,
                    'max' => 180,
                    'step' => 0.0001,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
