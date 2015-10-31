<?php

print_r('Add structure db');
$sql = file_get_contents(getcwd() . '/sql/structure.sql');
DBPool::me()->getLink()->queryRaw($sql);


