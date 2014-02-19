<?php
namespace User\Listener;

class AuthorizationListener implements ListenerAggregateInterface
{
    public function attach(EventManagerInterface $events)
    {
        [...]
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_RENDER, array($this, 'addAclToNavigation'), -100
        );
    }

    public function addAclToNavigation(EventInterface $e)
    {
        // get service manager, view manager and acl service
        $serviceManager = $e->getApplication()->getServiceManager();
        $viewManager    = $serviceManager->get('viewmanager');
        $auth           = $serviceManager->get('User\Authentication');
        $acl            = $serviceManager->get('User\Acl');
        $role           = $auth->hasIdentity()
            ? $auth->getIdentity()->getGroup()
            : 'guest';

        // set navigation plugin and set acl and role
        $plugin = $viewManager->getRenderer()->plugin('navigation');
        $plugin->setRole($role);
        $plugin->setAcl($acl);
    }

}

