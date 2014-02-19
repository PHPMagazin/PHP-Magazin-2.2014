<?php
// Datei /module/Blog/config/module.config.php

return array(
    'service_manager' => array(
        'services' => array(
            'Blog\Service\Article'  => \Blog_Service_Article::getInstance(),
            'Blog\Service\Category' => \Blog_Service_Category::getInstance(),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Blog\Controller\Index' => 'Blog\Controller\IndexControllerFactory',
        ),
    ),
);

