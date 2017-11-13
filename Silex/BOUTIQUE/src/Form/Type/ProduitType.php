<?php
namespace BOUTIQUE\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;





class ProduitType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('reference', TextType::class, array(
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Length(array(
                        'min' => 3,
                        'max' => 20
                    ))
                )
            ))

            ->add('categorie', TextType::class, array(/* Condition*/))
            ->add('titre', TextType::class, array(/* Condition*/))
            ->add('description', TextareaType::class, array())
            ->add('couleur', TextType::class, array(/* Condition*/))
            ->add('taille', TextType::class, array(/* Condition*/))
            ->add('photo', FileType::class, array(/* Condition*/))
            ->add('prix', TextType::class, array(/* Condition*/))
            ->add('stock', TextType::class, array(/* Condition*/))
                ->add('public', ChoiceType::class, array(
                    'choices' => array(
                        'Homme' => 'h',
                        'Femme' => 'f',
                        'Mixte' => 'mixte'
                    )
                ));



    }
}


 ?>
