<?php

namespace App\Form;

use App\Entity\Photographe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class Photographe1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Email', EmailType::class)
            ->add('TVA', TextType::class)
            ->add('Photo', FileType::class)
            ->add('CodePostal', TextType::class)
            ->add('Pays', TextType::class)
            
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Photographe::class,
        ]);
    }
}
