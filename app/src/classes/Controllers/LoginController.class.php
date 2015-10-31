<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.10.15
 * Time: 10:14
 */
class LoginController extends AppMethodMappedController
{

    public function loginAction(HttpRequest $httpRequest)
    {


    }

    protected function getMapping(){
        return
        [
          'login' => 'loginAction'
        ];
    }
}