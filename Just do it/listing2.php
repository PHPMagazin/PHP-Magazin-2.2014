return array(
    'router' => array(
        'routes' => array(
            'blog' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:lang/blog[/:page]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Blog\Controller',
                        'lang'   => 'de',
                        'controller' => 'index',
                        'action'     => 'index',
                    ),
                    'constraints' => array(
                        'lang'       => '(de|en)',
                        'page'       => '[0-9]*',
                    ),
                ),
            ),
            'blog-article' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:lang/beitrag/:url',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Blog\Controller',
                        'language'   => 'de',
                        'controller' => 'index',
                        'action'     => 'show',
                    ),
                    'constraints' => array(
                        'lang'       => '(de|en)',
                        'url'        => '[a-z0-9-]*',
                    ),
                ),
            ),
            'blog-category' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:lang/kategorie/:url[/:page]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Blog\Controller',
                        'language'   => 'de',
                        'controller' => 'index',
                        'action'     => 'category',
                    ),
                    'constraints' => array(
                        'lang'       => '(de|en)',
                        'url'        => '[a-z0-9-]*',
                        'page'       => '[0-9]*',
                    ),
                ),
            ),
            'blog-user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:lang/nutzer/:url[/:page]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Blog\Controller',
                        'language'   => 'de',
                        'controller' => 'index',
                        'action'     => 'user',
                    ),
                    'constraints' => array(
                        'lang'       => '(de|en)',
                        'url'        => '[a-z0-9-]*',
                        'page'       => '[0-9]*',
                    ),
                ),
            ),
        ),
    ),
);
