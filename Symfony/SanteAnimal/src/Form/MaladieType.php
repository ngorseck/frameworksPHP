<?php

namespace App\Form;

use App\Entity\Maladie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaladieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('required' => true, 'label'=>"Nom de la maladie", 'attr'=>array('class'=>'form-control form-group')))
            ->add('periode', TextType::class, array('required' => true, 'label'=>"Periode", 'attr'=>array('class'=>'form-control form-group')))
            ->add('animal', EntityType::class, array('class'=>'App\Entity\Animal', 'label'=>'Animal', 'attr'=>array('class'=>'form-control form-group')))
            ->add('Envoyer', SubmitType::class, array('attr'=>array('class'=>'btn btn-success')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Maladie::class,
        ]);
    }
}
