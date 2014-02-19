<?php
namespace Blog\Entity;

class ArticleEntity
{
    protected $_id = null;
    protected $_date = null;
    protected $_status = null;
    protected $_user = null;
    protected $_category = null;
    protected $_title = null;
    protected $_teaser = null;
    protected $_text = null;
    protected $_url = null;
    protected $_count = null;
    
    public function setId($id)
    {
        $id = (int) $id;
    
        if ($id != 0) {
            $this->_id = $id;
        }
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function setDate($date)
    {
        $this->_date = $date;
    }
    
    public function getDate()
    {
        return $this->_date;
    }
    
    public function setStatus($status)
    {
        if (!in_array($status, array('new', 'approved', 'blocked')))
        {
            return false;
        }
    
        $this->_status = $status;
    }
    
    public function getStatus()
    {
        return $this->_status;
    }
    
    public function setUser($user)
    {
        $this->_user = $user;
    }
    
    public function getUser()
    {
        return $this->_user;
    }
    
    public function setCategory($category)
    {
        $this->_category = $category;
    }
    
    public function getCategory()
    {
        return $this->_category;
    }
    
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }
    
    public function getTitle()
    {
        return $this->_title;
    }
    
    public function setTeaser($teaser)
    {
        if (is_string($teaser)) {
            $this->_teaser = $teaser;
        }
    }
    
    public function getTeaser()
    {
        return $this->_teaser;
    }
    
    public function setText($text)
    {
        if (is_string($text)) {
            $this->_text = $text;
        }
    }
    
    public function getText()
    {
        return $this->_text;
    }
    
    public function setUrl($url)
    {
        if (is_string($url)) {
            $this->_url = $url;
        }
    }
    
    public function getUrl()
    {
        return $this->_url;
    }
    
    public function setCount($count)
    {
        if (is_string($count)) {
            $this->_count = $count;
        }
    }
    
    public function getCount()
    {
        return $this->_count;
    }
}

