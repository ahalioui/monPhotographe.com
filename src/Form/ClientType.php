<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Rue', TextType::class)
            ->add('Numero', TextType::class)
            ->add('CodePostal', TextType::class)
            ->add('Pays', TextType::class)
            //->add('Login', TextType::class)
            //->add('Password', PasswordType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {

        
        
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
