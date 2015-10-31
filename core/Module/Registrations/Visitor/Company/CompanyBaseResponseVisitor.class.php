<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 14.09.15
 * Time: 22:58
 */
namespace Module\Registrations\Visitor\Company
{

    use Module\BaseVisitor;

    class CompanyBaseResponseVisitor extends BaseVisitor{

        public function visit()
        {
            print_r(__CLASS__);
        }
    }
}