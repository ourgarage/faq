<?php

return [

    'faq' => [

        'name' => 'faq',

        'menu' => [
            'url' => 'price::admin::index',
            'caption' => 'FAQ',
            'icon' => 'fa fa-question-circle',
            'active' => 'price::admin::index',
        ],

        'menu-settings' => [
            'url' => 'blog::admin::get-settings',
            'caption' => 'Blog settings',
            'icon' => 'fa fa-cog',
            'active' => 'blog::admin::get-settings',
        ],

        'default-settings' => [
            'meta-keywords' => 'Engin CMS, Laravel',
            'meta-description' => 'This package for Engin CMS',
            'meta-title' => 'Faq package',
        ],
    ],
];
