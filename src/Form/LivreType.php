<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Categorie;
use App\Form\LivreImageType;
use App\Form\LivreImageCollectionType;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre :',
                'attr' => [
                    'placeholder' => 'Titre du livre',
                ],
            ])
            ->add('description', CKEditorType::class, [
                'label' => 'Description :',
                'config' => [
                    'toolbar' => 'standard',
                ],
                'attr' => [
                    'placeholder' => 'Description du livre',
                ],
            ])
            ->add('prix', MoneyType::class, [
                'label' => 'Prix :',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix du livre',
                ],
            ])
            ->add('auteurs', EntityType::class, [
                'class' => Auteur::class,
                'label' => 'Auteurs :',
                'multiple' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'select2',
                    'data-placeholder' => 'Auteurs du livre',
                ],
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'by_reference' => false,
                'label' => 'Categorie :',
                'attr' => [
                    'placeholder' => 'Categorie du livre',
                ],
            ])
            ->add('editeur', EntityType::class, [
                'class' => Editeur::class,
                'choice_label' => 'nom',
                'label' => 'Editeur :',
                'by_reference' => false,
                'attr' => [
                    'placeholder' => 'Editeur du livre',
                ],
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Image :',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Image du livre',
                ],
            ])
            ->add('livreImages', CollectionType::class, [
                'label' => false,
                'entry_type' => LivreImageCollectionType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,],)
            ->remove('imageName')
            ->remove('updatedAt');
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
