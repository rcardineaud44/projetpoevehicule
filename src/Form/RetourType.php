<?php

namespace App\Form;

use App\Entity\Conducteur;
use App\Entity\Lieu;
use App\Entity\NatureDeplacement;
use App\Entity\Reservation;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RetourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class)
            ->add('litre_carburant', NumberType::class, array(
                'attr' => array(
                    'placeholder' => 'Litre',),
                'scale' => 2
            ))
            ->add('montant_carburant', NumberType::class, array(
                'attr' => array(
                    'placeholder' => 'Montant',)))
            ->add('km_parcourus', IntegerType::class, array(
                'attr' => array(
                    'placeholder' => 'Km parcourus',),
                'scale' => 2
            ))
            ->add('commentaire', TextareaType::class)
            ->add('destination', TextType::class)
            ->add('lieu', EntityType::class , array(
                'class' => Lieu::class,
                'choice_label' => 'lieu',
                'required' => true,
                "label" => "Lieu :"
            ))
            ->add('nature_deplacement', EntityType::class, array(
                'class' => NatureDeplacement::class,
                'choice_label' => 'Nature Deplacement',
                'required' => true,
                "label" => "Nature Déplacement :"
            ))
            ->add('vehicule', EntityType::class, array(
                'class' => Voiture::class,
                'choice_label' => 'kilometrage',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Km au compteur'
                )
            ))
            ->add('conduteur', EntityType::class, array(
                'class' => Conducteur::class,
                'choice_label' => 'nom',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Votre nom'
                )
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
