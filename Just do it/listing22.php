<?php
// Datei /module/Blog/config/module.config.php

return array(
    'router'          => array(
        'routes' => array(
            'blog'          => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'       => '/:lang/blog[/:page]',
                    'defaults'    => array(
                        [...]
                        'module'        => 'blog',
                    ),
                ),
            ),
            'blog-admin'    => array(
                'type'          => 'Segment',
                'options'       => array(
                    'route'       => '/:lang/blog/:controller[/:action]',
                    'defaults'    => array(
                        [...]
                        'module'        => 'blog',
                    ),
                ),
            ),
            'blog-article'  => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'       => '/:lang/beitrag/:url',
                    'defaults'    => array(
                        [...]
                        'module'        => 'blog',
                    ),
                ),
            ),
            'blog-category' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'       => '/:lang/kategorie/:url[/:page]',
                    'defaults'    => array(
                        [...]
                        'module'        => 'blog',
                    ),
                ),
            ),
            'blog-user'     => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'       => '/:lang/nutzer/:url[/:page]',
                    'defaults'    => array(
                        [...]
                        'module'        => 'blog',
                    ),
                ),
            ),
        ),
    ),

    [...]

    'acl' => array(
        'guest'   => array(
            'blog-index' => array(
                'allow' => null
            ),
        ),
        'editor' => array(
            'blog-admin' => array(
                'allow' => null,
                'deny'  => array('delete'),
            ),
        ),
        'admin'   => array(
            'blog-index'    => array('allow' => null),
            'blog-category' => array('allow' => null),
            'blog-admin'    => array('allow' => null),
        ),
    ),
);
