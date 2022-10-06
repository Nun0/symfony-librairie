<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('pseudo')
            ->add('biographie', CKEditorType::class, [
                'label' => 'Biographie :',
                'required' => false,
                'config' => [
                    'toolbar' => 'standard',
                ],
                'attr' => [
                    'placeholder' => 'Biographie de l\'auteur',
                ],
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Image :',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Image de l\'auteur',
                ],
            ])
            ->add('livres', EntityType::class, [
                'class' => Livre::class,
                'required' => false,
                'label' => 'Livre(s) :',
                'multiple' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'select2',
                    'data-placeholder' => 'Livres de l\'auteur',
                ],
            ])
            ->remove('imageName')
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}
