<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class PostAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'post_admin';
    protected $baseRouteName = 'post_admin';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list']);
    }
}