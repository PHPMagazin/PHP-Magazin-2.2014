<?php
namespace Blog\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerLoader)
    {
        $serviceLocator     = $controllerLoader->getServiceLocator();
        $formElementManager = $serviceLocator->get('FormElementManager');

        $articleService = $serviceLocator->get('Blog\Service\Article');
        $articleForm    = $formElementManager->get('Blog\Form\Article');

        $controller = new AdminController(
            $articleService, $articleForm
        );

        return $controller;
    }

} 
