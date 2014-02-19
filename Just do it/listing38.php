return array(
    'db' => array(
        'driver'  => 'Pdo',
        'dsn'     => 'mysql:dbname=zf2migration;host=localhost;charset=utf8',
        'user'    => 'zf2migration',
        'pass'    => 'test123',
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);
