<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 15.08.15
 * Time: 23:03
 */

return [
    'userLastName' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не правильно введенны данные в поле Фамилия',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле Фамилия обязательно для заполнения'
        ]
    ],
    'userFirstName' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не правильно введенны данные в поле Имя',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле Имя обязательно для заполнения'
        ]
    ],
    'userMiddleName' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не правильно введены данные в поле Отчество',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Полн Отчество обязательно для заполнения'
        ]
    ],
    'userPhone' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Не праильно введены данные в поле Телефон',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле Телефон обязательно для заполнения'
        ]
    ],
    'organizationType' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Вы не правильно выбрали тип Тип организации',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле тип орагнизации обязательно для заполнения'
        ]
    ],
    'opf' => [
        'primitiveSettings' => [
            'min' => 1,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Вы не правильно ввели опф организации',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле опф обязательно для регистрации'
        ]
    ],
    'name' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Вы не правильно ввели опф организации',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле опф обязательно для регистрации'
        ]
    ],
    'description' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Вы не правильно ввели поле описание компании',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле описание обязательно для заполнения'
        ]
    ],
    'city' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Вы не правильно ввели поле город',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле город обязательно для заполнения'
        ]
    ],
    'site' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => PrimitiveString::URL_PATTERN,
        'addCustomLabel' => [
            'error' => 'Вы не правильно ввели поле сайт',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле сайт обязательно для заполнения'
        ]
    ],
    'numbersWorker' => [
        'primitiveSettings' => [
            'min' => 1,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Вы не выбрали количсетво людей в компании Вашей компании',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Вы не выбрали количество штата вашей компании'
        ]
    ],
    'userPost' => [
        'primitiveSettings' => [
            'min' => 3,
        ],
        'pattern' => null,
        'addCustomLabel' => [
            'error' => 'Вы не правильно заполнили поле должность',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле должность обязательно для заполнения'
        ]
    ],
    'userEmail' => [
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
    'userPassword' => [
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
    'userPasswordConfirm' => [
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
    ],
    'captcha' => [
        'primitiveSettings' => [
            'min' => 5,
        ],
        'pattern' => null,//'/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])$/',
        'addCustomLabel' => [
            'error' => 'Вы не правильно заполнини поле Каптча',
            'type' => Form::WRONG
        ],
        'addMissingLabel' => [
            'error' => 'Поле каптча обязательно для заполнения'
        ]
    ]

];
