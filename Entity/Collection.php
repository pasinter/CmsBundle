<?php

namespace Pasinter\CmsBundle\Entity;


class Collection
{
    /**
     * @var string $code
     */
    protected $code;

    /**
     * @var string $description
     */
    protected $description;

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
    protected $pages;

    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->code;
    }
    
    /**
     * Set code
     *
     * @param string $code
     * @return Collection
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Collection
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     * @return Collection
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
     * @return Collection
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
     * Add pages
     *
     * @param Pasinter\CmsBundle\Entity\Page $pages
     * @return Collection
     */
    public function addPage(\Pasinter\CmsBundle\Entity\Page $pages)
    {
        $this->pages[] = $pages;
        return $this;
    }

    /**
     * Remove pages
     *
     * @param Pasinter\CmsBundle\Entity\Page $pages
     */
    public function removePage(\Pasinter\CmsBundle\Entity\Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
    }
}