<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 30.09.15
 * Time: 20:04
 */

namespace Module\Module\Operation {

    use Module\BaseOperation;

    class GetAllList extends BaseOperation
    {

        /**
         * @return \CoreGetListModuleOperationResponse
         */
        public function getResponse()
        {
            return parent::getResponse();
        }

        public function process()
        {
            $this->getResponse()
                ->setData(
                    \CoreModule::dao()
                        ->getList()
                )
                ->setSuccess(
                    true
                );
        }
    }
}