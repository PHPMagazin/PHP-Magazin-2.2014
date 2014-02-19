<?php
// Datei /module/Blog/config/module.config.php

return array(
    [...]

    'navigation'      => array(
        'default' => array(
            'blog'  => array(
                'type'       => 'mvc',
                'label'      => 'title_blog_index_index',
                'route'      => 'blog',
                'order'      => 100,
                'module'     => 'blog',
                'controller' => 'index',
                'action'     => 'index',
                'resource'   => 'blog-index',
                'privilege'  => 'index',
            ),
            'admin' => array(
                'pages' => array(
                    'blog-admin'    => array(
                        'type'       => 'mvc',
                        'order'      => '910',
                        'label'      => 'title_blog_admin_index',
                        'route'      => 'blog',
                        'controller' => 'admin',
                        'action'     => 'index',
                        'resource'   => 'blog-admin',
                        'privilege'  => 'index',
                    ),
                    'blog-category' => array(
                        'type'       => 'mvc',
                        'order'      => '920',
                        'label'      => 'title_blog_category_index',
                        'route'      => 'blog',
                        'controller' => 'category',
                        'action'     => 'index',
                        'resource'   => 'blog-category',
                        'privilege'  => 'index',
                    ),
                ),
            ),
        ),
    ),
);
