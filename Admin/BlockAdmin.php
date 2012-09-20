<?php

namespace Pasinter\Bundle\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BlockAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('code')
            ->add('page')
            
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                )
            ))
        ;
    }
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content')
                ->add('code', null, array('required' => true))
                ->add('page', null, array('required' => false))
                ->add('content', null, array('required' => true, 'attr' => array('class' => 'tinymce', 'tinymce'=>'{"theme":"simple"}')))
            ->end()
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('code')
            ->add('page')
        ;
    }
  
}