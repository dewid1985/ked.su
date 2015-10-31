<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 28.09.15
 * Time: 21:06
 */
return [
    'moduleId' => [
        'primitiveSettings' => [
            'min' => 1,
        ],
        'pattern' => null,//'/^[a-zA-Z0-9]+$/' ,
        'addCustomLabel' => [
            'error' => 'Не выбран модуль',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Модуль обязателен для заполнения'
        ]
    ],
    'moduleOperationName' => [
        'primitiveSettings' => [
            'min' => 4,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не правильно набранно поле Имя',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Имя обязательно для заполнения'
        ]
    ],
    'moduleOperationDescription' => [
        'primitiveSettings' => [
            'min' => 4,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не правильно набранно поле Описание',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Описание обязательно для заполнения'
        ]
    ]
];