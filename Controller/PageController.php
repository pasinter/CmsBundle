<?php

/*
 * This file is part of the Symfony framework.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Pasinter\CmsBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{

    public function viewAction($page_slug)
    {
        $em = $this->getDoctrine()->getEntityManager(); 
        $qb = $em->getRepository('PasinterCmsBundle:Page')->createQueryBuilder('p');
        
        $qb
            ->select('p')
            //->innerJoin('p.blocks', 'b')
            ->andWhere('p.slug = :slug')
            ->setParameter('slug', $page_slug)
            //->orderBy('m.name', 'ASC')
        ;
        
        $page = $qb->getQuery()->getSingleResult();
        
        if($page) {
            $this->get('pasinter_catalog.breadcrumbs_menu')->addChild($page->getTitle());
        }
        
        return $this->render('PasinterCmsBundle:Page:view.html.twig', array(
            'page' => $page
        ));
    }
    
    
    
}
