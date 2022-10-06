<?php

namespace App\Form;

use App\Entity\Home;
use App\Entity\Carousel;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CarouselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('imageName')
            ->add('titre', TextType::class, [
                'label' => 'Titre :',
                'required' => false,
            ])
            ->add('texte', CKEditorType::class, [
                'label' => 'Texte :',
                'required' => false,
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Image :',
                'required' => true,
            ])
            ->remove('updatedAt')
            ->add('homes', EntityType::class, [
                'label' => 'Homes :',
                'class' => Home::class,
                'required' => false,
                'multiple' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'select2',
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
        ]);
    }
}
