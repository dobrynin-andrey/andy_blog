<?php

namespace App\Form;

use App\Entity\Post;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('active', null,
                [
                    'required' => false
                ]
            )
            ->add('datePublish', DatePickerType::class,
                [
                    'format' => 'd.M.y'
                ]
            )
            ->add('type', ChoiceType::class,
                [
                    'choices' => [
                        'Post'   => 'post',
                        'Test'   => 'test'
                ]
            ])
            ->add('name', TextType::class)
            ->add('code', TextType::class,
                [
                    'required' => false
                ]
            )
            ->add('body', HiddenType::class,
                [
                    'attr' => [
                        'class' => 'js-codex-editor__body',
                        'hidden' => true
                    ]
                ]
            )
            ->add('category', null,
                [
                    'required' => true
                ]
            )
            ->add('anons', TextareaType::class)
            //->add('anonsPicture', FileType::class)
            //->add('detailPicture', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
