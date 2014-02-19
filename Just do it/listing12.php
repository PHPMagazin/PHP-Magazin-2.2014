<?php
// Datei /module/Blog/config/module.config.php

return array(
    'navigation'      => array(
        'default' => array(
            'blog'  => array(
                'type'  => 'mvc',
                'label' => 'title_blog_index_index',
                'route' => 'blog',
                'order' => 100,
            ),
            'admin' => array(
                'pages' => array(
                    'blog-admin'    => array(
                        'type'  => 'uri',
                        'label' => 'title_blog_admin_index',
                        'uri'   => '/de/blog/admin',
                    ),
                    'blog-category' => array(
                        'type'  => 'uri',
                        'label' => 'title_blog_category_index',
                        'uri'   => '/de/blog/category',
                    ),
                ),
            ),
        ),
    ),
);

