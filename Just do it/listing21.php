<?php
// Datei /module/User/config/module.config.php
return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:lang/user[/:controller[/:action]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'lang'          => 'de',
                        'module'        => 'user',
                        'controller'    => 'index',
                        'action'        => 'index',
                    ),
                    'constraints' => array(
                        'lang'       => '(de|en)',
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'user' => 'User\Controller\IndexController',
        ),
    ),

    [...]
);
