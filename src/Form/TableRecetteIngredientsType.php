<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\TableRecetteIngredients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TableRecetteIngredientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite')
            ->add('ordre')
            ->add('etape')
         // ->add('recette')
            ->add('ingredient', EntityType::class, [
                    'class' => Ingredient::class,
                    'choice_label' => 'nom'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TableRecetteIngredients::class,
        ]);
    }
}
