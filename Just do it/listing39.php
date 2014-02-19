<?php
namespace Blog\Service;

use Blog\Table\ArticleTable;

class ArticleService
{
    protected $table;

    function __construct(ArticleTable $table)
    {
        $this->setTable($table);
    }

    public function fetchMany()
    {
        $list = $this->getTable()->fetchMany();

        return $this->getEntityList($list);
    }

    public function fetchManyByCategory($category)
    {
        $list = $this->getTable()->fetchManyByCategory($category);

        return $this->getEntityList($list);
    }

    public function fetchManyByStatus($status)
    {
        $list = $this->getTable()->fetchManyByStatus($status);

        return $this->getEntityList($list);
    }

    public function fetchManyByUser($user)
    {
        $list = $this->getTable()->fetchManyByUser($user);

        return $this->getEntityList($list);
    }

    public function fetchSingleById($identifier)
    {
        return $this->getTable()->fetchSingleById($identifier);
    }

    public function fetchSingleByUrl($url)
    {
        return $this->getTable()->fetchSingleByUrl($url);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    protected function getEntityList($list)
    {
        $newList = array();

        foreach ($list as $entity) {
            $newList[$entity->getId()] = $entity;
        }

        return $newList;
    }

}
