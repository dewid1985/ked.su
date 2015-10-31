<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 22.09.15
 * Time: 23:42
 */
print_r('drop schema');
try {
    $sql = file_get_contents(getcwd() . '/sql/dropScheme.sql');
    DBPool::me()->getLink()->queryRaw($sql);
} catch (Exception $e) {
}