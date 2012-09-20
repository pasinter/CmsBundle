<?php

namespace Pasinter\Bundle\CmsBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerAwareInterface,
    Symfony\Component\DependencyInjection\ContainerInterface;


class BlockExtension extends \Twig_Extension implements ContainerAwareInterface
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
            'cms_block_get' => new \Twig_Function_Method($this, 'get'),
            'cms_block_render' => new \Twig_Function_Method($this, 'render', array('is_safe' => array('html'))),
        );
    }

    
    /**
     *
     * @param string $code
     * @param array $path
     * @param array $options
     * @return type 
     */
    public function get($code, array $options = array())
    {
        $em = $this->container->get('doctrine')->getEntityManager(); 
        
        $qb = $em->getRepository('PasinterCmsBundle:Block')->createQueryBuilder('b');
        
        $qb
            ->select('b')
            ->andWhere('b.code = :code')
            ->setParameter('code', $code)
            ->andWhere('b.page IS NULL')
        ;
        
        try {
            $block = $qb->getQuery()->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
        
        return $block;
    }


    public function render($code, array $options = array(), $renderer = null)
    {
        $block = $this->get($code, $options);

        if($block) {
            return $block->getContent();
        }
        
        return '';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_block';
    }
}
