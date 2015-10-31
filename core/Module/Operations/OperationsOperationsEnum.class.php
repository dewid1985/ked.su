<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 10.09.15
 * Time: 9:39
 */

namespace Module\Operations {

    use Module\BaseOperation;

    class OperationsOperationsEnum extends \Enum
    {
        const
            ADD = 1,
            GET_ALL_LIST = 2,
            DROP = 3;

        protected static $names = [
            self::ADD => 'Add',
            self::GET_ALL_LIST => 'GetAllList',
            self::DROP => 'Drop'
        ];


        /**
         * @param $id
         * @return BaseOperation
         */
        public static function getObjectOperation($id)
        {
            $enumeration = new self($id);
            $className = __NAMESPACE__ . '\\Operation\\' . $enumeration->getName();
            return new $className();
        }
    }
}