<?php
// Datei /module/User/config/module.config.php
return array(
    'service_manager' => array(
        'services' => array(
            'Zend\Auth'  => \Zend_Auth::getInstance(),
            'User\Service\User'  => \User_Service_User::getInstance(),
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'userWidget' => 'User\View\Helper\UserWidgetFactory'
        ),
    ),
    [...]
);
