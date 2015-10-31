<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 15.08.15
 * Time: 23:03
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
    ],
    'passwordConfirm' => [
        'primitiveSettings' => [
            'min' => 8,
        ],
        'pattern' => null,//'/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])$/',
        'addCustomLabel' => [
            'error' => 'Вы не правльно заполнини поле Повторить пароль',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле повторить пароль обязательно для заполнения'
        ]
    ]
];
