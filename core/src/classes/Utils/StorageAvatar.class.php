<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22.10.15
 * Time: 0:03
 */

class StorageAvatar extends AppBase
{
    public function getPathTmp()
    {
        return PATH_PROJECT_IMAGE.'profile-avatar/tmp/';
    }

    public function getPath()
    {
        return PATH_PROJECT_IMAGE.'profile-avatar/users/';
    }

}