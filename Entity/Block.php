<?php

namespace Pasinter\CmsBundle\Entity;


class Block
{

 
    /**
     * @var string $code
     */
    private $code;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var integer $pageId
     */
    private $pageId;

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
     * @var Pasinter\CmsBundle\Entity\Page
     */
    private $page;


    /**
     *
     * @return string 
     */
    public function __toString()
    {
        $text = $this->getCode();
        
        if($this->getPage()) {
            $text .= ' - ' . $this->getPage()->getTitle();
        }
        
        return $text;
    }
    /**
     * Set code
     *
     * @param string $code
     * @return Block
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
     * Set content
     *
     * @param text $content
     * @return Block
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
     * Set pageId
     *
     * @param integer $pageId
     * @return Block
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer 
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     * @return Block
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
     * @return Block
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
     * Set page
     *
     * @param Pasinter\CmsBundle\Entity\Page $page
     * @return Block
     */
    public function setPage(\Pasinter\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Get page
     *
     * @return Pasinter\CmsBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
    
}