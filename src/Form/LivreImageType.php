<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\LivreImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LivreImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'required' => true,
            ])
            ->add('livres', EntityType::class, [
                'label' => 'Livres',
                'class' => Livre::class,
                'choice_label' => 'titre',
                'multiple' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'select2',
                    'data-placeholder' => 'Choisissez un ou plusieurs livres',
                ],])
            ->add('imageFile', FileType::class, [
                'label' => 'Image',
                'required' => false,
            ])
            ->remove('imageName')
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LivreImage::class,
        ]);
    }
}
