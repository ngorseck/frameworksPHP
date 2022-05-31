<?php

namespace App\Form;

use App\Entity\Traitement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraitementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class, array('required' => true, 'label'=>'Libelle', 'attr'=>array('class'=>'form-control form-group')))
            ->add('date', TextType::class, array('required' => true, 'label'=>'Date', 'attr'=>array('class'=>'form-control form-group')))
            ->add('animal', EntityType::class, array('class'=>'App\Entity\Animal', 'label'=>'Animal', 'attr'=>array('class'=>'form-control form-group')))
            ->add('maladie', EntityType::class, array('class'=>'App\Entity\Maladie', 'label'=>'Nom de la maladie', 'attr'=>array('class'=>'form-control form-group')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traitement::class,
        ]);
    }
}
