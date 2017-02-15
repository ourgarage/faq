<?php

return [
    'index' => [
        'title' => 'FAQ',
        'menu' => 'Меню',
        'home' => 'Главная',
    ],

    'category' => [
        'title' => 'FAQ - Все категории',
        'no-categories' => 'Нет ни одной категории',
        'add' => 'Новая категория',
        'edit' => 'Правка категории',

        'popup' => [
            'activate' => 'Вы действительно хотите включить эту категорию?',
            'deactivate' => 'Вы действительно хотите выключить эту категорию?',
            'delete' => 'Вы действительно хотите удалить эту категорию?',
        ],

        'table' => [
            'uri' => 'URI',
            'title' => 'Название',
            'created' => 'Дата создания',
            'options' => 'Опции'
        ]
    ],

    'qa' => [
        'title' => 'Все вопросы и ответы',
        'no-qa' => 'У вас нет ни одного вопроса',
        'must-category' => 'Сначала необходимо создать хотя бы одну категорию',
        'add' => 'Новый вопрос',
        'edit' => 'Правка вопроса',

        'popup' => [
            'activate' => 'Вы действительно хотите включить этот вопрос?',
            'deactivate' => 'Вы действительно хотите выключить этот вопрос?',
            'delete' => 'Вы действительно хотите удалить этот вопрос?',
        ],

        'table' => [
            'uri' => 'URI',
            'title' => 'Название',
            'created' => 'Дата создания',
            'options' => 'Опции',
            'category' => 'Категория',
            'select-category' => 'Выберите категорию',
            'question' => 'Вопрос',
            'answer' => 'Ответ'
        ]
    ],

    'button' => [
        'create' => 'Создать',
        'save' => 'Сохранить'
    ],

    'notifications' => [

        'error' => [
            'unexpected' => 'Произошла непредвиденная ошибка. Попробуйте еще раз',

            'category' => [
                'create' => 'Не удалось создать категорию. Произошла непредвиденная ошибка. Попробуйте еще раз',
                'update' => 'Не удалось обновить категорию. Произошла непредвиденная ошибка. Попробуйте еще раз',
                'delete' => 'Не удалось удалить категорию. Произошла непредвиденная ошибка. Попробуйте еще раз',
                'status' => 'Не удалось изменить статус категории. Произошла непредвиденная ошибка. Попробуйте еще раз'
            ]
        ],

        'success' => [

            'category' => [
                'create' => 'Категория FAQ успешно создана',
                'update' => 'Категория FAQ успешно обновлена',
                'delete' => 'Категория FAQ успешно удалена',
                'status' => 'Статус категории успешно изменен'
            ]
        ]
    ],

    'front' => [
        'index-head' => 'Часто задаваемые вопросы',
        'no-qa' => 'FAQ отсутствует',
        'question' => 'Вопрос',
        'answer' => 'Ответ',
        'back' => 'Назад на главную FAQ',
        'searching' => 'Результаты поиска'
    ]
];
