<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 18.09.15
 * Time: 21:06
 */
return [
    'roleGroupName' => [
        'primitiveSettings' => [
            'min' => 4,
        ],
        'pattern' => null,//'/^[a-zA-Z0-9]+$/' ,
        'addCustomLabel' => [
            'error' => 'Неправильно набранно поле Название',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Название обязательно для заполнения'
        ]
    ],
    'roleGroupDescription' => [
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