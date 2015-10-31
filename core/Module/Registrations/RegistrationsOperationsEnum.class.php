<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 10.09.15
 * Time: 9:39
 */

namespace Module\Registrations
{

    use Module\BaseOperation;

    class RegistrationsOperationsEnum extends \Enum {
        const
            REGISTRATION_COMPANY = 1;

        protected static $names = [
            self::REGISTRATION_COMPANY => 'Company'
        ];


        /**
         * @param $id
         * @return BaseOperation
         */
        public static function getObjectOperation($id)
        {
            $enumeration = new self($id);
            $className  = __NAMESPACE__.'\\Operation\\'.$enumeration->getName();
            return new $className();
        }
    }
}