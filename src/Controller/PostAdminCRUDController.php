<?php

namespace App\Controller;

use App\Entity\Post;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            //->add('active', CheckboxType::class, ['required' => false])
            //->add('category', EntityType::class)
            ->add('anons', TextareaType::class)
            //->add('anonsPicture', FileType::class)
            //->add('detailPicture', FileType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
            dump($post);
            die();

            // ... perform some action, such as saving the data to the database

//            $response = new RedirectResponse('/task/success');
//            $response->prepare($request);

            return $response->send();
        }




        return $this->renderWithExtraParams('admin/create_post.html.twig',
            ['form' => $form->createView()]
        );
    }
}