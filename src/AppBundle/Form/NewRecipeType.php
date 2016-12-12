<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewRecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name", \Symfony\Component\Form\Extension\Core\Type\TextType::class, array('label'=>"Nume reteta: "))
            ->add("method", TextareaType::class, array('label'=>"Mod de praparare: "))
            ->add("pieces", \Symfony\Component\Form\Extension\Core\Type\IntegerType::class, array('label'=>"Portii: "))
            ->add("preparation_time", \Symfony\Component\Form\Extension\Core\Type\IntegerType::class, array('label'=>"Timp de preparare: "))
            ->add("cook_time", \Symfony\Component\Form\Extension\Core\Type\IntegerType::class, array('label'=>"Timp de gatire: "))
            ->add("terms", CheckboxType::class, array(
                'label'=>"Am citit si sunt de acord cu termenii si conditiile!",
                'mapped'=>false))
            ->add("Categorie", ChoiceType::class, [
                'placeholder'=>"Alege categoria",
                'mapped'=>false,
                'choices'=>[
                    'Aperitiv' =>true,
                    'Salate'=>false,
                    'Paste'=>false
                ]
            ])
            ->add("save", SubmitType::class, array("label"=>'Salveaza'))
            ->add("reset", ResetType::class, array("label"=>'Reset'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Recipes'
        ]);
    }

    public function getName()
    {
        return 'app_bundle_new_recipe_type';
    }
}
