<?php
// Datei /module/User/config/module.config.php

return array(
    [...]

    'service_manager' => array(
        'factories' => array(
            'User\Acl' => 'User\Acl\AclFactory',
        ),
        [...]
    ),

    [...]
);
