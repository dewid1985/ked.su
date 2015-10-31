<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.04.15
 * Time: 2:18
 */
abstract class BaseCore
{
    public static function create()
    {
        return new static();
    }
}