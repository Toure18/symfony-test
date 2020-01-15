<?php

namespace App\Form;

use App\Entity\Upload;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class UploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', FileType::class, [
                'label'=>' ',
                'mapped'=> false,
                'required'=> false,
                'constraints'=> [
                    /*new File([
                        'maxSize'=> '500K',
                        'mimeTypes' =>[
                            'file/csv',
                        ],
                        'mimeTypesMessage'=>'Veuillez insérez un fichier .csv.'
                    ])*/
            ]])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Upload::class,
        ]);
    }
}
