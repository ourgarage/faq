<?php

return [

    'faq' => [

        'name' => 'faq',

        'menu' => [
            'url' => 'faq::admin::categories::index',
            'caption' => 'FAQ',
            'icon' => 'fa fa-question-circle',
            'active' => 'faq::admin::categories::index',
            'subitems' => [
                [
                    'url' => 'faq::admin::categories::index',
                    'caption' => 'Categories',
                    'icon' => 'fa fa-list',
                    'active' => 'faq::admin::categories::index'
                ],

                [
                    'url' => 'faq::admin::qa::index',
                    'caption' => 'Questions',
                    'icon' => 'fa fa-list',
                    'active' => 'faq::admin::qa::index'
                ]
            ]
        ],

        'default-settings' => [
            'meta-keywords' => 'Engin CMS, Laravel',
            'meta-description' => 'This package for Engin CMS',
            'meta-title' => 'Faq package',
        ],
    ],
];
