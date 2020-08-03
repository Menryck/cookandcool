<?php

namespace App\Form;

use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use App\Form\TableRecetteIngredientsType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('type')
            ->add('categorie')
            ->add('difficulte')
            ->add('duree')
            ->add('cuisson')
            ->add('instructions')
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
                // form_collection
            ->add ('ingredient', CollectionType::class, [
                'entry_type' => TableRecetteIngredientsType::class,
                'label' => " ",
                'entry_options' => ['label' => 'ingredient'],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
            ]);
// form_collection fin
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
