<?php
namespace Blog\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerLoader)
    {
        $serviceLocator = $controllerLoader->getServiceLocator();

        $articleService  = $serviceLocator->get('Blog\Service\Article');
        $categoryService = $serviceLocator->get('Blog\Service\Category');
        $userService     = $serviceLocator->get('User\Service\User');

        $controller = new IndexController(
            $articleService, $categoryService, $userService
        );

        return $controller;
    }

} 
