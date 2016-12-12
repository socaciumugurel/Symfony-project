<?php
/**
 * Created by PhpStorm.
 * User: Mugurel
 * Date: 12/5/2016
 * Time: 4:49 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fileLocation', FileType::class, array('label'=>'Inarcati o imagine sau pdf'))
            ->add("save", SubmitType::class, array("label"=>'Adauga'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\RecipePictures'
        ));


    }
}