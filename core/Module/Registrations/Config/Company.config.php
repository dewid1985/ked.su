<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 11.09.15
 * Time: 20:58
 */

return [
    'RequestObjectName' => '\CoreRegistrationCompanyRequest',
    'ResponseObjectName' => '\CoreRegistrationCompanyResponse',
    'Visitors' => [
        'Request' => [
            'CompanyBaseRequestVisitor'
        ],
        'Response' => [
            'CompanyBaseResponseVisitor'
        ]
    ]
];