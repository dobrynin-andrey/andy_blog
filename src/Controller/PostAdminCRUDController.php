<?php

namespace App\Controller;

use App\Entity\Post;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Translation\Translator;

class PostAdminCRUDController extends CRUDController
{
    public function createAction()
    {
        $post = new Post();

        $form = $this->createFormBuilder($post)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Статья' => 'post',
                    'Тест'   => 'test'
                ]
            ])
            ->add('name', TextType::class)
            ->add('code', TextType::class, ['required' => false])
            ->add('body', HiddenType::class, ['attr' => ['class' => 'js-codex-editor__body', 'hidden' => true]])
            //->add('active', CheckboxType::class, ['required' => false])
            //->add('category', EntityType::class)
            //->add('anons', TextareaType::class)
            //->add('anonsPicture', FileType::class)
            //->add('detailPicture', FileType::class)
//            ->add('submit', SubmitType::class)
            ->getForm();


        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            $this->getRequest()->getSession()->getFlashBag()->add("success", 'Элемент создан успешно');

        }




        return $this->renderWithExtraParams('admin/create_post.html.twig',
            ['form' => $form->createView()]
        );
    }



    public function editAction($id = null)
    {

        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(Post::class)->find($id);

        $form = $this->createFormBuilder($post)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Статья' => 'post',
                    'Тест'   => 'test'
                ]
            ])
            ->add('name', TextType::class)
            ->add('code', TextType::class, ['required' => false])
            ->add('body', HiddenType::class, ['attr' => ['class' => 'js-codex-editor__body', 'hidden' => true]])
            //->add('active', CheckboxType::class, ['required' => false])
            //->add('category', EntityType::class)
            //->add('anons', TextareaType::class)
            //->add('anonsPicture', FileType::class)
            //->add('detailPicture', FileType::class)
//            ->add('submit', SubmitType::class)
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            $this->getRequest()->getSession()->getFlashBag()->add("success", 'Элемент успешно обновлен.');
        }

        return $this->renderWithExtraParams('admin/create_post.html.twig',
            ['form' => $form->createView()]
        );
    }
}