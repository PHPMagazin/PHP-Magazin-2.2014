<?php
// Datei /module/Blog/config/module.config.php

return array(
    'hydrators'       => array(
        'invokables' => array(
            'Blog\Hydrator\Article'  => 'Blog\Hydrator\ArticleHydrator',
            'Blog\Hydrator\Category' => 'Blog\Hydrator\CategoryHydrator',
        ),
    ),
);
