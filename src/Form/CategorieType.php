<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de categorie :',
                'attr' => [
                    'placeholder' => 'Nom de categorie',
                ],
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug de categorie :',
                'attr' => [
                    'placeholder' => 'Slug de categorie',
                ],
            ])
            ->remove('livres', EntityType::class, [
                'class' => Livre::class,
                'label' => 'Livres :',
                'multiple' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'select2',
                    'data-placeholder' => 'Livres de la categorie',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
