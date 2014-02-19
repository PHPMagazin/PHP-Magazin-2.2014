<?php
// Datei /module/Blog/config/module.config.php

return array(
    'service_manager' => array(
        'shared'     => array(
            'Blog\Entity\Article'  => false,
            'Blog\Entity\Category' => false,
        ),
        'invokables' => array(
            'Blog\Entity\Article'  => 'Blog\Entity\ArticleEntity',
            'Blog\Entity\Category' => 'Blog\Entity\CategoryEntity',
        ),
        'factories'  => array(
            'Blog\Table\Article'    => 'Blog\Table\ArticleTableFactory',
            'Blog\Table\Category'   => 'Blog\Table\CategoryTableFactory',
            'Blog\Service\Article'  => 'Blog\Service\ArticleServiceFactory',
            'Blog\Service\Category' => 'Blog\Service\CategoryServiceFactory',
        ),
    ),
);


