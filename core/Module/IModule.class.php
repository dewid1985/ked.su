<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 09.09.15
 * Time: 9:25
 */
namespace Module {
    interface IModule
    {
        public function getNamespaceThis();

        /**
         * @return BaseOperation
         */
        public function getOperation();

        /**
         * @param BaseOperation $operation
         * @return mixed
         */
        public function setOperation(BaseOperation $operation);

    }
}