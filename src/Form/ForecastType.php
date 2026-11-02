<?php

namespace App\Form;

use App\Entity\Forecast;
use App\Entity\Location;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForecastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',  DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'data-provide' => 'datepicker',
                ]
            ])
            ->add('temperature',  NumberType::class, [
                'html5' => true,
                'scale' => 3,
                'attr' => [
                    'min' => -100,
                    'max' => 100,
                    'step' => 0.01,
                ]
            ])
            ->add('precipitation', NumberType::class, [
                'html5' => true,
                'scale' => 2,
                'attr' => [
                    'min' => 0,
                    'max' => 10,
                    'step' => 0.1,
                ]
            ])
            ->add('humidity', NumberType::class, [
                'html5' => true,
                'scale' => 2,
                'attr' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 0.1,
                ]
            ])
            ->add('cloudiness',NumberType::class, [
                'html5' => true,
                'scale' => 2,
                'attr' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 0.1,
                ]
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'city',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forecast::class,
        ]);
    }
}
