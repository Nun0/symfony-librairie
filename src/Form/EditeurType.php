<?php

namespace App\Form;

use App\Entity\Editeur;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom :',
                'attr' => [
                    'placeholder' => 'Nom de l\'éditeur',
                ],
            ])
            ->add('description', CKEditorType::class, [
                'label' => 'Description :',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Description de l\'éditeur',
                ],
            ])
            ->remove('logoName')
            ->add('logoFile', FileType::class, [
                'label' => 'Logo :',
                'required' => false,
            ])
            ->remove('imageName')
            ->add('imageFile', FileType::class, [
                'label' => 'Image :',
                'required' => false,
            ])
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Editeur::class,
        ]);
    }
}
