<?php
// Datei /module/Blog/config/module.config.php

return array(
    'service_manager' => array(
        'shared' => array(
            'Blog\Entity\Article'  => false,
            'Blog\Entity\Category' => false,
        ),
        'invokables' => array(
            'Blog\Entity\Article'  => 'Blog\Entity\ArticleEntity',
            'Blog\Entity\Category' => 'Blog\Entity\CategoryEntity',
        ),
        [...]
    ),
);
