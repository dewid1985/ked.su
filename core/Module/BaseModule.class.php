<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 09.09.15
 * Time: 20:26
 */

namespace Module {
    abstract class BaseModule extends DispatcherModule implements IModule
    {
        /** @var  BaseOperation */
        protected $operation;

        /**
         * @return BaseOperation
         */
        public function getOperation()
        {
            return $this->operation;
        }

        /**
         * @param $operation
         * @return $this
         */
        public function setOperation(BaseOperation $operation)
        {
            $this->operation = $operation;
            return $this;
        }


        abstract public function getNamespaceThis();

    }
}