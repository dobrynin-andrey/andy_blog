<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PostAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'post_admin';
    protected $baseRouteName = 'post_admin';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['create', 'list']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name');
    }

}