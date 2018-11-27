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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RetourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class)
            ->add('litre_carburant', IntegerType::class)
            ->add('montant_carburant', IntegerType::class)
            ->add('km_parcourus', IntegerType::class)
            ->add('commentaire', TextareaType::class)
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
                "label" => "Km au compteur :"
            ))
            ->add('conduteur', EntityType::class, array(
                'class' => Conducteur::class,
                'choice_label' => 'conduteur',
                'required' => true,
                "label" => "conducteur :"
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
