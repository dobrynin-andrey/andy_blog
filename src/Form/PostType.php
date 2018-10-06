<?php

namespace App\Form;

use App\Entity\Post;
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
                    'label' =>'Активность',
                    'required' => false
                ]
            )
            ->add('datePublish', null,
                ['label' => 'Дата публикации',
                    'format' => 'd.M.y'
                ]
            )
            ->add('type', ChoiceType::class,
                [
                    'label' => 'Тип',
                    'choices' => [
                        'Статья' => 'post',
                        'Тест'   => 'test'
                ]
            ])
            ->add('name', TextType::class,
                ['label' => 'Название']
            )
            ->add('code', TextType::class,
                [
                    'label'=> 'Символьный код',
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
                    'label' => 'Категория',
                    'required' => true
                ]
            )
            ->add('anons', TextareaType::class,
                [
                    'label' => 'Анонс'
                ]
            )
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
