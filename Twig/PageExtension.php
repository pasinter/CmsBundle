<?php

namespace Pasinter\CmsBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerAwareInterface,
    Symfony\Component\DependencyInjection\ContainerInterface;


class PageExtension extends \Twig_Extension implements ContainerAwareInterface
{

    /**
     *
     * @var ContainerInterface
     */
    protected $container;
    
    /**
     *
     * @param ContainerInterface $container 
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        
        return $this;
    }
    
    public function getFunctions()
    {
        return array(
            'cms_page_get' => new \Twig_Function_Method($this, 'get'),
            'cms_page_render_content' => new \Twig_Function_Method($this, 'renderContent', array('is_safe' => array('html'))),
            'cms_page_block_render' => new \Twig_Function_Method($this, 'renderBlock', array('is_safe' => array('html'))),
            'cms_page_block_get' => new \Twig_Function_Method($this, 'getBlock'),
        );
    }

    
    /**
     *
     * @param string $code
     * @param array $path
     * @param array $options
     * @return \Pasinter\CmsBundle\Enity\Page|null
     */
    public function get(array $options = array())
    {
        $request = $this->container->get('request');
        $routeName = $request->get('_route');

        $em = $this->container->get('doctrine')->getManager(); 
        
        $qb = $em->getRepository('PasinterCmsBundle:Page')
                ->createQueryBuilder('p')
                ->select('p, b')
                ->leftJoin('p.blocks', 'b')
        ;
        
        
        if('cms_page' === $routeName) {
            $qb
                ->andWhere('p.route = :route')
                ->setParameter('route', 'cms_page')
                ->andWhere('p.slug = :slug')
                ->setParameter('slug', $request->get('page_slug'))
            ;
        } else {
            // non cms page
            $qb
                ->andWhere('p.route = :route')
                ->setParameter('route', $routeName)
            ;
        }
       
        try {
            $page = $qb->getQuery()->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
        
        return $page;
    }
    
    /**
     *
     * @param array $options
     * @return string
     */
    public function renderContent(array $options = array())
    {
        $page = $this->get($options);

        if($page) {
            // content is a special type
            return $page->getContent();
        }
        
        return '';
    }


    /**
     *
     * @param string $code
     * @param array $options
     * @return string
     */
    public function renderBlock($code, array $options = array())
    {
        $block = $this->getBlock($code, $options);

        if($block) {
            return $block->getContent();
        }
        
        return '';
    }
    
    /**
     *
     * @param type $code
     * @param array $options
     * @return \Pasinter\CmsBundle\Enity\Block|null
     */
    public function getBlock($code, array $options = array())
    {
        $page = $this->get($options);

        if($page && $block = $page->getBlockByCode($code)) {
            return $block;
        }
        
        return null;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_page';
    }
}
