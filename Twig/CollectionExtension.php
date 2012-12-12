<?php

namespace Pasinter\CmsBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerAwareInterface,
    Symfony\Component\DependencyInjection\ContainerInterface;


class CollectionExtension extends \Twig_Extension implements ContainerAwareInterface
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
            'cms_collection_get' => new \Twig_Function_Method($this, 'get'),
            'cms_collection_render' => new \Twig_Function_Method($this, 'render', array('is_safe' => array('html'))),
        );
    }

    
    /**
     *
     * @param string $code
     * @param array $path
     * @param array $options
     * @return type 
     */
    public function get($code, array $path = array(), array $options = array())
    {
        $em = $this->container->get('doctrine')->getEntityManager(); 
        
        $qb = $em->getRepository('PasinterCmsBundle:Collection')->createQueryBuilder('c');
        
        $qb
            ->select('c')
            ->leftJoin('c.pages', 'p')
            ->andWhere('c.code = :code')
            ->setParameter('code', $code)
            //->orderBy('m.name', 'ASC')
        ;
        
        
        try {
            $collection = $qb->getQuery()->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
        return $collection;
    }


    public function render($menu, array $options = array(), $renderer = null)
    {
        
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_collection';
    }
}
