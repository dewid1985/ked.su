<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 17.09.15
 * Time: 21:06
 */
return [
    'login' => [
        'primitiveSettings' => [
            'min' => 6,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не правильно введенны данные в поле Логин',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле Логин обязательно для заполнения'
        ]
    ],
    'password' => [
        'primitiveSettings' => [
            'min' => 6,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не правильно введенны данные в поле Пароль',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле Пароль обязательно для заполнения'
        ]
    ]
];