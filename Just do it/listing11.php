<?php
// Datei /module/Application/config/module.config.php

return array(
    'navigation'      => array(
        'default' => array(
            'about' => array(
                'type'  => 'uri',
                'label' => 'title_default_about_index',
                'uri'   => '/de/default/about',
                'order' => 200,
            ),
            'user'  => array(
                'type'  => 'uri',
                'label' => 'title_user_index_index',
                'uri'   => '/de/user',
                'order' => 300,
            ),
            'admin' => array(
                'type'  => 'uri',
                'label' => 'title_default_admin_index',
                'uri'   => '#dropdown1',
                'order' => 400,
                'pages' => array(
                    'user-admin'    => array(
                        'type'  => 'uri',
                        'label' => 'title_user_admin_index',
                        'uri'   => '/de/user/admin',
                    ),
                ),
            ),
        ),
    ),
);

