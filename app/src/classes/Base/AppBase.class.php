<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.04.15
 * Time: 14:59
 */
abstract class AppBase{

    static public function create()
    {
        return new static();
    }
}