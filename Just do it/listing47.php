<?php
namespace Blog\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hydratorManager = $serviceLocator->get('HydratorManager');

        $table    = $serviceLocator->get('Blog\Table\Article');
        $hydrator = $hydratorManager->get('Blog\Hydrator\Article');
        $entity   = $serviceLocator->get('Blog\Entity\Article');

        $service = new ArticleService($table, $entity, $hydrator);

        return $service;
    }

} 
