<?php
namespace User\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserWidgetFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $viewHelperManager)
    {
        $serviceLocator = $viewHelperManager->getServiceLocator();

        $identity    = $serviceLocator->get('Zend\Auth');
        $userService = $serviceLocator->get('User\Service\User');

        $controller = new UserWidget($identity->getIdentity(), $userService);

        return $controller;
    }

} 
