<?php

namespace Pasinter\CmsBundle\Entity;


class Page
{

 
    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var text $content
     */
    protected $content;

    /**
     * @var datetime $createdAt
     */
    protected $createdAt;

    /**
     * @var datetime $updatedAt
     */
    protected $updatedAt;

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $blocks;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $collections;

    public function __construct()
    {
        $this->blocks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->collections = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->title;
    }
    
    /**
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getRouteParams()
    {
        if('cms_page' === $this->getRoute()) {
            return array('page_slug' => $this->slug);
        }
        
        return array();
    }

    /**
     * Set content
     *
     * @param text $content
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     * @return Page
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     * @return Page
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add blocks
     *
     * @param Pasinter\CmsBundle\Entity\Block $blocks
     * @return Page
     */
    public function addBlock(\Pasinter\CmsBundle\Entity\Block $blocks)
    {
        $this->blocks[] = $blocks;
        return $this;
    }
    
    public function addBlocks(\Pasinter\CmsBundle\Entity\Block $block)
    {
        return $this->addBlock($block);
    }

    /**
     * Remove blocks
     *
     * @param Pasinter\CmsBundle\Entity\Block $blocks
     */
    public function removeBlock(\Pasinter\CmsBundle\Entity\Block $blocks)
    {
        $this->blocks->removeElement($blocks);
    }

    /**
     * Get blocks
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
    
    /**
     * @param string $code
     * @return Pasinter\CmsBundle\Entity\Block
     */
    public function getBlockByCode($code)
    {
        foreach($this->getBlocks() as $block) {
            if($code === $block->getCode()) {
                return $block;
            }
        }
        
        return null;
    }

    /**
     * Add collections
     *
     * @param Pasinter\CmsBundle\Entity\Collection $collections
     * @return Page
     */
    public function addCollection(\Pasinter\CmsBundle\Entity\Collection $collections)
    {
        $this->collections[] = $collections;
        return $this;
    }

    /**
     * Remove collections
     *
     * @param Pasinter\CmsBundle\Entity\Collection $collections
     */
    public function removeCollection(\Pasinter\CmsBundle\Entity\Collection $collections)
    {
        $this->collections->removeElement($collections);
    }

    /**
     * Get collections
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCollections()
    {
        return $this->collections;
    }
    /**
     * @var string $slug
     */
    protected $slug;


    /**
     * Set slug
     *
     * @param string $slug
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * @var string $route
     */
    protected $route = 'cms_page';

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $children;


    /**
     * Set route
     *
     * @param string $route
     * @return Page
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Add children
     *
     * @param Pasinter\CmsBundle\Entity\Page $children
     * @return Page
     */
    public function addChildren(\Pasinter\CmsBundle\Entity\Page $children)
    {
        $this->children[] = $children;
        return $this;
    }

    /**
     * Remove children
     *
     * @param Pasinter\CmsBundle\Entity\Page $children
     */
    public function removeChildren(\Pasinter\CmsBundle\Entity\Page $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

  
    /**
     * @var Pasinter\CmsBundle\Entity\Page
     */
    protected $parent;


    /**
     * Set parent
     *
     * @param Pasinter\CmsBundle\Entity\Page $parent
     * @return Page
     */
    public function setParent(\Pasinter\CmsBundle\Entity\Page $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return Pasinter\CmsBundle\Entity\Page 
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     *
     * @return string 
     */
    public function getLink()
    {
        $link = $this->getRoute();
        
        if(count($this->getRouteParams()) > 0) {
            $link .= '?';
            
            $routeParams = array();
            foreach($this->getRouteParams() as $key => $value) {
                $routeParams[] = $key . '=' . $value;
            }
            
            $link .= implode('&', $routeParams);
        }
        
        return $link;
    }
}