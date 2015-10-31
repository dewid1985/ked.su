<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.12.14
 * Time: 17:34
 */

RouterRewrite::me()
    ->addRoute(
        'in Admin',
        RouterTransparentRule::create('/')
            ->setDefaults(
                [
                    'area' => 'Main',
                    'action' => 'index'
                ]
            )
    )
    ->addRoute(
        'add resume view',
        RouterTransparentRule::create('/login')
            ->setDefaults(
                [
                    'area' => 'Main',
                    'action' => 'login'
                ]
            )
    )
    ->addRoute(
        'registration users',
        RouterTransparentRule::create('/registration')
        ->setDefaults(
            [
                'area' => 'Registration',
                'action' => 'registration'
            ]
        )
    )
    ->addRoute(
        'repeat registration',
        RouterTransparentRule::create('/registration/repeat')
        ->setDefaults(
            [
                'area' => 'Registration',
                'action' => 'repeat'
            ]
        )
    )
    ->addRoute(
        'registration confirm',
        RouterTransparentRule::create('/registration/confirm')
        ->setDefaults(
            [
                'area' => 'Registration',
                'action' => 'confirm'
            ]
        )
    )
    ->addRoute(
        'signin controller',
        RouterTransparentRule::create('/signin')
        ->setDefaults(
            [
                'area' => 'SignIn',
                'action' => 'index'
            ]
        )
    )
    ->addRoute(
        'registration profile',
        RouterTransparentRule::create('/profile/registration')
            ->setDefaults(
                [
                    'area' => 'Profile',
                    'action' => 'registration'
                ]
            )
    )
    ->addRoute(
        'upload avatar user registration profile',
        RouterTransparentRule::create('/profile/upload-avatar')
            ->setDefaults(
                [
                    'area' => 'Profile',
                    'action' => 'uploadAvatar'
                ]
            )
    )
    ->addRoute(
        'crop image',
        RouterTransparentRule::create('/profile/crop')
        ->setDefaults(
            [
                'area' => 'Profile',
                'action' => 'crop'
            ]
        )
    )
    ->addRoute(
        'test',
        RouterTransparentRule::create('/test')
        ->setDefaults(
            [
                'area' => 'Test',
                ''
            ]
        )
        )

;