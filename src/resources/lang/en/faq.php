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
        'no-qa' => 'You have no questions',
        'must-category' => 'First, you must create at least one category',
        'add' => 'Create question',
        'edit' => 'Edit question',

        'popup' => [
            'activate' => 'Do you want to activate this question?',
            'deactivate' => 'Do you want to deactivate this question?',
            'delete' => 'Do you want to delete this question?'
        ],

        'table' => [
            'uri' => 'URI',
            'title' => 'Title',
            'created' => 'Date created',
            'options' => 'Options',
            'category' => 'Category',
            'select-category' => 'Select category',
            'question' => 'Question',
            'answer' => 'Answer'
        ]
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
            ],

            'qa' => [
                'create' => 'Question has been successfully created',
                'update' => 'Question has been successfully updated',
                'delete' => 'Question has been successfully deleted',
                'status' => 'Status of question has been successfully changed'
            ]
        ]
    ],

    'front' => [
        'index-head' => 'Frequently asked Questions',
        'no-qa' => 'You have no FAQ',
        'question' => 'Question',
        'answer' => 'Answer',
        'back' => 'Back to home FAQ',
        'searching' => 'Search results'
    ]
];
