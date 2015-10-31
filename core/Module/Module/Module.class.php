<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 09.09.15
 * Time: 9:22
 */

namespace Module\Module {

    use Module\BaseModule;

    class Module extends BaseModule
    {

        public function getNamespaceThis()
        {
            return __NAMESPACE__;
        }

    }
}