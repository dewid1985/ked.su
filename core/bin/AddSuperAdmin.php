<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 23.09.15
 * Time: 21:00
 */

AdminUser::dao()
    ->add(
        AdminUser::create()
        ->setPassword(password_hash('dewid1985', PASSWORD_DEFAULT))
        ->setEmail('dewid_1985@mail.ru')
        ->setLogin('dewid1985')
    );

print_r('Add super-admin');