<?php
namespace User;

use User\Listener\AuthorizationListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        // add authorization listener
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attachAggregate(new AuthorizationListener());
    }
}

