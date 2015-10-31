<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 23.09.15
 * Time: 1:20
 */
print_r('insert data demo db');
$sql = file_get_contents(getcwd().'/sql/insertData.sql');
DBPool::me()->getLink()->queryRaw($sql);