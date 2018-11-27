<?php

namespace App\Form;

use App\Entity\Lieu;
use App\Entity\TypeCarburant;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Reference', TextType::class)
            ->add('kilometrage', IntegerType::class)
            ->add('typeCarburant', EntityType::class, array(
                'class' => TypeCarburant::class,
                'choice_label' => 'Carburant',
                'required' => true,
                "label" => "Type de Carburant :"
            ))
            ->add('lieu', EntityType::class, array(
                'class' => Lieu::class,
                'choice_label' => 'lieu',
                'required' => true,
                "label" => "Lieu :"
            ))
            ->add('Disponibilite', HiddenType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
