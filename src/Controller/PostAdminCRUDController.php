<?php

namespace App\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

class PostAdminCRUDController extends CRUDController
{
    public function listAction()
    {
        return $this->renderWithExtraParams('admin/post_admin.html.twig');
    }
}