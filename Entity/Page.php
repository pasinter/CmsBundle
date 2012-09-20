<?php

namespace Pasinter\Bundle\CmsBundle\Entity;


class Page
{

 
    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $link
     */
    private $link;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var datetime $createdAt
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     */
    private $updatedAt;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $blocks;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $collections;

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
     * Set link
     *
     * @param string $link
     * @return Page
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
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
     * @param Pasinter\Bundle\CmsBundle\Entity\Block $blocks
     * @return Page
     */
    public function addBlock(\Pasinter\Bundle\CmsBundle\Entity\Block $blocks)
    {
        $this->blocks[] = $blocks;
        return $this;
    }

    /**
     * Remove blocks
     *
     * @param Pasinter\Bundle\CmsBundle\Entity\Block $blocks
     */
    public function removeBlock(\Pasinter\Bundle\CmsBundle\Entity\Block $blocks)
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
     * Add collections
     *
     * @param Pasinter\Bundle\CmsBundle\Entity\Collection $collections
     * @return Page
     */
    public function addCollection(\Pasinter\Bundle\CmsBundle\Entity\Collection $collections)
    {
        $this->collections[] = $collections;
        return $this;
    }

    /**
     * Remove collections
     *
     * @param Pasinter\Bundle\CmsBundle\Entity\Collection $collections
     */
    public function removeCollection(\Pasinter\Bundle\CmsBundle\Entity\Collection $collections)
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
    private $slug;


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
}