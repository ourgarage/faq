<?php

return [

    'faq' => [

        'name' => 'faq',

        'menu' => [
            'url' => 'faq::admin::index',
            'caption' => 'FAQ',
            'icon' => 'fa fa-question-circle',
            'active' => 'faq::admin::index',
            'subitems' => [
                [
                    'url' => 'faq::admin::categories::index',
                    'caption' => 'Categories',
                    'icon' => 'fa fa-list',
                    'active' => 'faq::admin::categories::index'
                ],

                [
                    'url' => 'faq::admin::qa::index',
                    'caption' => 'Questions-Answers',
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
