<?php
// Datei /module/Blog/config/module.config.php

return array(
    'form_elements'   => array(
        'invokables' => array(
            'Blog\Form\Category' => 'Blog\Form\CategoryForm',
        ),
        'factories'  => array(
            'Blog\Form\Article' => 'Blog\Form\ArticleFormFactory',
        ),
    ),
);


