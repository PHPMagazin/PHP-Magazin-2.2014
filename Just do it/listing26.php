<?php
namespace User\Listener;

use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Mvc\MvcEvent;

class AuthorizationListener implements ListenerAggregateInterface
{
    protected $listeners = array();

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_DISPATCH, array($this, 'checkAcl'), 100
        );
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    public function checkAcl(MvcEvent $e)
    {
        // get route match, params and objects
        $routeMatch       = $e->getRouteMatch();
        $serviceManager   = $e->getApplication()->getServiceManager();
        $controllerLoader = $serviceManager->get('ControllerLoader');
        $auth             = $serviceManager->get('User\Authentication');
        $acl              = $serviceManager->get('User\Acl');
        
        // try to load current controller
        try {
            $controller = $controllerLoader->get($routeMatch->getParam('controller'));
        } catch (\Exception $exception) {
            return;
        }
        
        // get role, resource and privilege
        $role      = $auth->hasIdentity() ? $auth->getIdentity()->getGroup() : 'guest';
        $resource  = $routeMatch->getParam('module') . '-' . $routeMatch->getParam('__CONTROLLER__');
        $privilege = $routeMatch->getParam('action');

        // check for default / application
        if (strstr($resource, 'application_')) {
            $resource = str_replace('application_', 'default_', $resource);
        }
        
        // check acl
        if (!$acl->isAllowed($role, $resource, $privilege)) {
            // change response for redirect
            $response=$e->getResponse();
            $response->getHeaders()->addHeaderLine('Location', '/de/user/index/forbidden');
            $response->setStatusCode(302);
            $response->sendHeaders();
            return $response;
        }
    }
}

