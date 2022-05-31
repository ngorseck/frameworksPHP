<?php

namespace App\Form;

use App\Entity\Animal;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('required' => true, 'label'=>"Nom de l'animal", 'attr'=>array('class'=>'form-control form-group')))
            ->add('categorie', TextType::class, array('required' => true, 'label'=>"Categorie de l'animal", 'attr'=>array('class'=>'form-control form-group')))
            ->add('Envoyer', SubmitType::class, array('attr'=>array('class'=>'btn btn-success')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
