<?php
// Datei /module/Blog/config/module.config.php

return array(
    'service_manager' => array(
        [...]
        'factories' => array(
            'Blog\Table\Article'  => 'Blog\Table\ArticleTableFactory',
            'Blog\Table\Category' => 'Blog\Table\CategoryTableFactory',
        ),
    ),
);


