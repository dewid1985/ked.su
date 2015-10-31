<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 14.09.15
 * Time: 22:58
 */
namespace Module\Module\Visitor\Add
{

    use Module\BaseVisitor;

    class AddBaseResponseVisitor extends BaseVisitor{

        public function visit()
        {
            print_r(__CLASS__);
        }
    }
}