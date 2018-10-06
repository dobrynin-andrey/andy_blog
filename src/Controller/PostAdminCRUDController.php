<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Sonata\AdminBundle\Controller\CRUDController;

class PostAdminCRUDController extends CRUDController
{
    public function createAction()
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            $this->getRequest()->getSession()->getFlashBag()->add("success", 'Элемент создан успешно');

            return $this->redirectToRoute('post_admin_list');

        }




        return $this->renderWithExtraParams('admin/create_post.html.twig',
            ['form' => $form->createView()]
        );
    }



    public function editAction($id = null)
    {

        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(Post::class)->find($id);

        $form = $this->createForm(PostType::class, $post);

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