<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 11.09.15
 * Time: 20:58
 */

return [
    'RequestObjectName' => '\CoreAddModuleRequest',
    'ResponseObjectName' => '\CoreBaseResponse',
    'Visitors' => [
        'Request' => [
            'AddBaseRequestVisitor'
        ],
        'Response' => [
            'AddBaseResponseVisitor'
        ]
    ]
];