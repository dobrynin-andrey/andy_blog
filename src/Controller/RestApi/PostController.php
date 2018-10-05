<?php

namespace App\Controller\RestApi;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;


class PostController extends AbstractController
{

    /**
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function show(Request $request, TranslatorInterface $translator)
    {
        try {

            $this->isAjax($request, $translator);

            $response = [];

            $response[] = $request->get('name');


        } catch (Exception $exception) {
            $response['errors'][] = $exception->getMessage();
        }



        $response['success'] = 1;

        return $this->json($response);
    }

    public function processForm(Post $post) {


    }


    public function new(Request $request, TranslatorInterface $translator) {
        try {

            $this->isAjax($request, $translator);

            $response = [];



            $post = new Post();


            $form = $this->createForm('App\Form\PostType', $post);

            dump($request->request);
            dump($form->getName());
            dump($request->request->all());
            dump($request->request->get('form'));

            $form->submit($request->request->get('form'));
//            dump($request);
//            dump($form);

            dump($form->isSubmitted());
            foreach ($form->getErrors(true, false) as $error) {
                //throw new Exception($error);
                dump($error->getMessage());
            }

            dd($form->isValid());

            if ($form->isSubmitted() && $form->isValid()) {
                $post = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($post);
                $entityManager->flush();
                dump($post);
                dump($entityManager);
                die();
            }

            $response[] = $request->get('name');


        } catch (Exception $exception) {
            $response['errors'][] = $exception->getMessage();
        }



        $response['success'] = 1;

        return $this->json($response);
    }


    public function edit(Request $request, TranslatorInterface $translator) {
        try {

            $this->isAjax($request, $translator);

            $response = [];



            $post = new Post();


            $form = $this->createForm($post);


            $form->handleRequest($request);


            if ($form->isSubmitted() && $form->isValid()) {
                $post = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($post);
                $entityManager->flush();
                dump($post);
                die();
            }

            $response[] = $request->get('name');


        } catch (Exception $exception) {
            $response['errors'][] = $exception->getMessage();
        }



        $response['success'] = 1;

        return $this->json($response);
    }

    public function list() {
        return $this->json(['list']);
    }

    /**
     * @param Request $request
     * @param TranslatorInterface $translator
     */
    public function isAjax(Request $request, TranslatorInterface $translator) {
        if ($request->isXmlHttpRequest()) // TODO change to not !
            throw new Exception($translator->trans('Not xml http request'));
    }
}
