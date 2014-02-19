<?php
namespace Blog\Service;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $table = $serviceLocator->get('Blog\Table\Article');

        $service = new ArticleService($table);

        return $service;
    }
} 
