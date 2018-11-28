<?php

namespace App\Form;

use App\Entity\Conducteur;
use App\Entity\Lieu;
use App\Entity\NatureDeplacement;
use App\Entity\Reservation;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RetourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateUtilisation', DateTimeType::class, [
                'label'=> 'Date du trajet : '
            ])
            ->add('litreCarburant', NumberType::class)
            ->add('montantCarburant', NumberType::class)
            ->add('kmParcouru', IntegerType::class)
            ->add('destination', TextType::class)
            ->add('commentaire', TextareaType::class)
            ->add('nature', EntityType::class, [
                'class' => NatureDeplacement::class,
                'choice_label' => 'natureDeplacement',
                'required' => true,
                "label" => "Nature deplacement :"
            ])
            ->add('lieu', EntityType::class, [
                    'class' => Lieu::class,
                    'choice_label' => 'lieu',
                    'required' => true,
                    "label" => "Lieu de reception vehicule :"
            ])
            ->add('vehicule', EntityType::class, [
                'class' => Voiture::class,
                'choice_label' => 'Kilometrage',
                'required' => true,
                "label" => "Kilometrage au compteur :"
            ])

            ->add('conduteur', EntityType::class, array(
                    'class' => Conducteur::class,
                    'choice_label' => 'Conducteur',
                    'required' => true,
                    "label" => "Conducteur :"
            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
