<?php

return [
    'index' => [
        'title' => 'FAQ',
        'menu' => 'Menu',
        'home' => 'Home',
    ],

    'category' => [
        'title' => 'FAQ - All categories',
        'no-categories' => 'You have no categories',
        'add' => 'Create category',
        'edit' => 'Edit category',

        'popup' => [
            'activate' => 'Do you want to activate this category?',
            'deactivate' => 'Do you want to deactivate this category?',
            'delete' => 'Do you want to delete this category?'
        ],

        'table' => [
            'uri' => 'URI',
            'title' => 'Title',
            'created' => 'Date created',
            'options' => 'Options'
        ]
    ],

    'qa' => [
        'title' => 'All questions and answers',
        'no-qa' => 'You have no questions-answers',
        'must-category' => 'First, you must create at least one category',
        'add' => 'Create question-answer',
        'edit' => 'Edit question-answer',
    ],

    'button' => [
        'create' => 'Create',
        'save' => 'Save'
    ],

    'notifications' => [

        'error' => [
            'unexpected' => 'An unexpected error occurred. Try again',

            'category' => [
                'create' => 'Failed to create category. An unexpected error occurred. Try again',
                'update' => 'Failed to update category. An unexpected error occurred. Try again',
                'delete' => 'Failed to delete category. An unexpected error occurred. Try again',
                'status' => 'Failed to change status of category. An unexpected error occurred. Try again'
            ]
        ],

        'success' => [

            'category' => [
                'create' => 'Category of FAQ has been successfully created',
                'update' => 'Category of FAQ has been successfully updated',
                'delete' => 'Category of FAQ has been successfully deleted',
                'status' => 'Status of category has been successfully changed'
            ]
        ]
    ]
];
