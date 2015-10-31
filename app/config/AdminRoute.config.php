<?php

RouterRewrite::me()
    ->addRoute(
        'admin',
        RouterTransparentRule::create('/admin/')
            ->setDefaults(
                [
                    'area' => 'Admin',
                    'action' => 'admin'
                ]
            )
    )
    ->addRoute(
        'login admin',
        RouterTransparentRule::create('/admin/login/')
            ->setDefaults(
                [
                    'area' => 'Admin',
                    'action' => 'login'
                ]
            )
    )
    ->addRoute(
        'admin panel',
        RouterTransparentRule::create('/admin/index/')
            ->setDefaults(
                [
                    'area' => 'Admin',
                    'action' => 'index'
                ]
            )
    )
    ->addRoute(
        'admin logout',
        RouterTransparentRule::create('/admin/logout/')
            ->setDefaults(
                [
                    'area' => 'Admin',
                    'action' => 'logout'
                ]
            )
    )
    ->addRoute(
        'administration users',
        RouterTransparentRule::create('/admin/users/')
            ->setDefaults(
                [
                    'area' => 'Admin',
                    'action' => 'users'
                ]
            )
    )
    ->addRoute(
        'administration role',
        RouterTransparentRule::create('/admin/role/')
            ->setDefaults(
                [
                    'area' => 'Admin',
                    'action' => 'role'
                ]
            )
    )
    ->addRoute(
        'administration add module',
        RouterTransparentRule::create('/admin/module/add')
            ->setDefaults(
                [
                    'area' => 'AdminModule',
                    'action' => 'add'
                ]
            )
    )
    ->addRoute(
      'administration get modules',
        RouterTransparentRule::create('/admin/module/get')
        ->setDefaults(
            [
                'area' => 'AdminModule',
                'action' => 'get'
            ]
        )
    )
    ->addRoute(
        'administration drop module',
        RouterTransparentRule::create('/admin/module/drop')
        ->setDefaults(
            [
                'area' => 'AdminModule',
                'action' => 'drop'
            ]
        )
    )
    ->addRoute(
        'admin test',
        RouterTransparentRule::create('/admin/test/')
            ->setDefaults(
                [
                    'area' => 'Admin',
                    'action' => 'test'
                ]
            )
    )
    ->addRoute(
        'administration add role group',
        RouterTransparentRule::create('/admin/role-group/add')
            ->setDefaults(
                [
                    'area' => 'AdminRoleGroup',
                    'action' => 'add'
                ]
            )
    )
    ->addRoute(
        'administration get list role group',
        RouterTransparentRule::create('/admin/role-group/get')
            ->setDefaults(
                [
                    'area' => 'AdminRoleGroup',
                    'action' => 'get'
                ]
            )
    )
    ->addRoute(
        'administration drop role group',
        RouterTransparentRule::create('/admin/role-group/drop')
            ->setDefaults(
                [
                    'area' => 'AdminRoleGroup',
                    'action' => 'drop'
                ]
            )
    )
    ->addRoute(
        'administration add module operation group',
        RouterTransparentRule::create('/admin/operation/add')
            ->setDefaults(
                [
                    'area' => 'AdminModuleOperation',
                    'action' => 'add'
                ]
            )
    )
    ->addRoute(
        'administration get list operations',
        RouterTransparentRule::create('admin/operation/get')
            ->setDefaults(
                [
                    'area' => 'AdminModuleOperation',
                    'action' => 'get'
                ]
            )
    )
    ->addRoute(
        'administration drop operation',
        RouterTransparentRule::create('admin/operation/drop')
            ->setDefaults(
                [
                    'area' => 'AdminModuleOperation',
                    'action' => 'drop'
                ]
            )
    )
    ->addRoute(
        'administration module multimedia',
        RouterTransparentRule::create('admin/multimedia/')
            ->setDefaults(
                [
                    'area' => 'Multimedia',
                    'action' => 'index'
                ]
            )
    )
    ->addRoute(
        'administration module add photo',
        RouterTransparentRule::create('admin/multimedia/add-photo')
            ->setDefaults(
                [
                    'area' => 'Multimedia',
                    'action' => 'addPhoto'
                ]
            )
    )
    ->addRoute(
        'upload image',
        RouterTransparentRule::create('admin/multimedia/upload')
            ->setDefaults(
                [
                    'area' => 'Multimedia',
                    'action' => 'uploadImage'
                ]
            )
    )
;
