<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PostAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'post_admin';
    protected $baseRouteName = 'post_admin';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clear();
        //dd($this->getRouterIdParameter());
        $collection->add('create')
        ->add(  'list')
        ->add('edit', $this->getRouterIdParameter().'/edit');
       // $collection->add('edit', $this->getRouterIdParameter().'/edit', [], [], [], '', ['http'], ['GET', 'POST']);
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('code');
    }

//    protected function configureFormFields(FormMapper $formMapper)
//    {
//        $formMapper
//            ->add('name')
//            ->add('code');
//    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('type')
            ->addIdentifier('name')
            ->addIdentifier('code');
    }

}