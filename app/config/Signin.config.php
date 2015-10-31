<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.10.15
 * Time: 0:32
 */
return [
    'email' => [
        'primitiveSettings' => [
            'min' => 5,
        ],
        'pattern' => PrimitiveString::MAIL_PATTERN,
        'addCustomLabel' => [
            'error' => 'Вы не правильно заполнили поле Email',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле Email обязательно для заполнения'
        ]
    ],
    'password' => [
        'primitiveSettings' => [
            'min' => 8,
        ],
        'pattern' => null,//'/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])$/',
        'addCustomLabel' => [
            'error' => 'Вы не правильно заполнинил поле пароль',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле пароль обязательно для заполнения'
        ]
    ]
];