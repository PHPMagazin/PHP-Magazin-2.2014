<?php
namespace Blog\Table;

use Blog\Entity\ArticleEntity;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\TableGateway;

class ArticleTable extends TableGateway
{
    public function __construct(
        AdapterInterface $adapter, ResultSetInterface $resultSetPrototype = null
    ) {
        parent::__construct(
            'blog_articles', $adapter, null, $resultSetPrototype
        );
    }

    public function fetchSingleById($identifier)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('article_id', $identifier);

        return $this->selectWith($select)->current();
    }

    public function fetchSingleByUrl($url)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('article_url', $url);

        return $this->selectWith($select)->current();
    }

    public function fetchMany()
    {
        $select = $this->getSql()->select();
        $select->order('article_date DESC');

        return $this->selectWith($select);
    }

    public function fetchManyByCategory($category)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('article_category', $category);
        $select->where->equalTo('article_status', 'approved');
        $select->order('article_date DESC');

        return $this->selectWith($select);
    }

    public function fetchManyByUser($user)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('article_user', $user);
        $select->where->equalTo('article_status', 'approved');
        $select->order('article_date DESC');

        return $this->selectWith($select);
    }

    public function fetchManyByStatus($status)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('article_status', $status);
        $select->order('article_date DESC');

        return $this->selectWith($select);
    }
}


