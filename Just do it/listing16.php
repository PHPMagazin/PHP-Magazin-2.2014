<?php
// Datei /module/User/config/module.config.php

return array(
    'service_manager' => array(
        'services' => array(
            'User\Service\User'  => \User_Service_User::getInstance(),
        ),
    ),
);

