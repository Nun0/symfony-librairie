<?php

namespace App\Form;

use App\Entity\Home;
use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('texte')
            ->add('carousels', EntityType::class, [
                'label' => 'Carousels :',
                'class' => Carousel::class,
                'required' => false,
                'by_reference' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'select2',
                ]])
            ->add('isActive', CheckboxType::class, [
                'label' => 'Actif',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
