<?php

namespace Pasinter\Bundle\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PageAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('link')
            ->add('collections')
            
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
                ->add('title', null, array('required' => true))
                ->add('link', null, array('required' => true))
                ->add('collections', null, array('required' => false))

                ->add('content', null, array('required' => true, 'attr' => array('class' => 'tinymce', 'style'=>'min-width:700px;min-height: 300px;', 'tinymce'=>'{"theme":"advanced"}')))
            ->end()
                
            /*
            ->with('Blocks')
                ->add('blocks', 'sonata_type_collection', array('label' => ' ', 'by_reference' => false, 'required' => false),  array(
                        // http://stackoverflow.com/questions/11501022/sonata-admin-bundle-form-type-sonata-type-collection-custom-template
                        'edit' => 'inline',
                        'inline' => 'table',
                        'link_parameters' => array('pageId' => $this->subject->getId()),
                        ))
            ->end()
             * 
             */
        ;
    }
    
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('title')
            ->add('link')
        ;
    }
  
}