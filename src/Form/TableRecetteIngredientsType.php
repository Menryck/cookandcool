<?php

namespace App\Form;

use App\Entity\TableRecetteIngredients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TableRecetteIngredientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite')
            ->add('ordre')
            ->add('etape')
            ->add('recette')
            ->add('ingredient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TableRecetteIngredients::class,
        ]);
    }
}
