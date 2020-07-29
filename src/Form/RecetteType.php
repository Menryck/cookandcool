<?php

namespace App\Form;

use App\Entity\Recette;
// use App\Entity\TableRecetteIngredients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('difficulte')
            ->add('duree')
            ->add('cuisson')
            ->add('photo', FileType::class,[
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '10240k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'désolé ce format est interdit',
                    ])
                ],
            ])
            ->add('ingredientsRecette')
            // ->add('quantite', EntityType::class, [
            //     'class' => TableRecetteIngredients::class
            // ])
            ->add('instructions')
            ->add('type')
            ->add('categorie')
            ->add('nbrePart')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
