<?php

namespace App\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

class PostAdminCRUDController extends CRUDController
{
    public function createAction()
    {
        return $this->renderWithExtraParams('admin/create_post.html.twig');
    }
}