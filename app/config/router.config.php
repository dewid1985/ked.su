<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 13.08.15
 * Time: 0:19
 */

return [
    [
        'description' => 'in admin',
        'url' => '/',
        'defaults' => [
            'area' => 'Main',
            'action' => 'index'
        ],
        'requirements' => null,
    ], [
        'description' => 'add resume view',
        'url' => '/add-resume',
        'defaults' => [
            'area' => 'Resume',
            'action' => 'index'
        ],
        'requirements' => null,
    ], [
        'description' => 'vacancy create',
        'url' => '/company/create',
        'defaults' => [
            'area' => 'Company',
            'action' => 'create'
        ],
        'requirements' => null,
    ], [
        'description' => 'user recover password',
        'url' => '/recover-password',
        'defaults' => [
            'area' => 'Users',
            'action' => 'recoverPassword'
        ],
        'requirements' => null
    ]
];


RouterRewrite::me()
    ->addRoute(
        'user recover password',
        RouterTransparentRule::create('/recover-password')
            ->setDefaults(
                [
                    'area' => 'Users',
                    'action' => 'recoverPassword'
                ]
            )
    )
    ->addRoute(
        'hr',
        RouterTransparentRule::create('/hr')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'index'
                ]
            )
    )
    ->addRoute(
        'hr profile',
        RouterTransparentRule::create('/hr/profile')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'profile'
                ]
            )
    )
    ->addRoute(
        'hr search resume',
        RouterTransparentRule::create('/hr/search-resume')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'search'
                ]
            )
    )
    ->addRoute(
        'hr company',
        RouterTransparentRule::create('/hr/company')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'company'
                ]
            )
    )
    ->addRoute(
        'hr colleague',
        RouterTransparentRule::create('/hr/colleague')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'colleague'
                ]
            )
    )
    ->addRoute(
        'hr vacancy',
        RouterTransparentRule::create('/hr/vacancy')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'vacancy'
                ]
            )
    )
    ->addRoute(
        'hr create vacancy',
        RouterTransparentRule::create('/hr/create-vacancy')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'createVacancy'
                ]
            )
    )
    ->addRoute(
        'hr edit company',
        RouterTransparentRule::create('/hr/edit-company')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'editCompany'
                ]
            )
    )
    ->addRoute(
        'responses and invitation',
        RouterTransparentRule::create('/hr/responses-and-invitations')
            ->setDefaults(
                [
                    'area' => 'Hr',
                    'action' => 'responsesAndInvitations'
                ]
            )
    )
    ->addRoute(
        'applicant cabinet',
        RouterTransparentRule::create('/applicant/search')
            ->setDefaults(
                [
                    'area' => 'Applicant',
                    'action' => 'index'
                ]
            )
    )
    ->addRoute(
        'applicant search',
        RouterTransparentRule::create('/applicant')
            ->setDefaults(
                [
                    'area' => 'Applicant',
                    'action' => 'index'
                ]
            )
    )
    ->addRoute(
        'applicant add new resume',
        RouterTransparentRule::create('/applicant/add-resume')
            ->setDefaults(
                [
                    'area' => 'Applicant',
                    'action' => 'addResume'
                ]
            )
    )
    ->addRoute(
        'applicant profile',
        RouterTransparentRule::create('/applicant/profile')
            ->setDefaults(
                [
                    'area' => 'Applicant',
                    'action' => 'profile'
                ]
            )
    )
    ->addRoute(
        'resume add experience',
        RouterTransparentRule::create('/applicant/resume/add-experience')
            ->setDefaults(
                [
                    'area' => 'Resume',
                    'action' => 'addExperience'
                ]
            )
    )
    ->addRoute(
        'resume add recommendation',
        RouterTransparentRule::create('/applicant/resume/add-recommendation')
            ->setDefaults(
                [
                    'area' => 'Resume',
                    'action' => 'addRecommendation'
                ]
            )
    )
    ->addRoute(
        'applicant my resume',
        RouterTransparentRule::create('applicant/my-resume')
            ->setDefaults(
                [
                    'area' => 'Applicant',
                    'action' => 'myResume'
                ]
            )
    )
    ->addRoute(
        'applicant responses',
        RouterTransparentRule::create('applicant/responses')
            ->setDefaults(
                [
                    'area' => 'Applicant',
                    'action' => 'responses'
                ]
            )
    )
    ->addRoute(
        'autocomplete city',
        RouterTransparentRule::create('city/get')
            ->setDefaults(
                [
                    'area' => 'City',
                    'action' => 'get'
                ]
            )
    )
    ->addRoute(
        'testing',
        RouterTransparentRule::create('test/test')
            ->setDefaults(
                [
                    'area' => 'Test/Test',
                    'action' => 'index'
                ]
            )
    );


//    ->addRoute(
//        'Main Controller variables in action',
//        RouterTransparentRule::create('/action/:variables')
//            ->setRequirements(
//                array(
//                    'variables' => '\d+'
//                )
//            )
//            ->setDefaults(
//                array(
//                    'area' => 'Main',
//                    'action' => 'in',
//                    'variables' => null
//                )
//            )
//    )

;