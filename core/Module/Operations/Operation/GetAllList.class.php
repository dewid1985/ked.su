<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 30.09.15
 * Time: 20:04
 */

namespace Module\Operations\Operation {

    use Module\BaseOperation;

    class GetAllList extends BaseOperation
    {

        /**
         * @return \CoreGetListOperationsOperationResponse
         */
        public function getResponse()
        {
            return parent::getResponse();
        }

        public function process()
        {
            try {
                $this->getResponse()->setData(\CoreOperation::getAllList());
                $this->getResponse()->setSuccess(true);
            }catch (\BaseException $e)
            {
                $this->getResponse()->setError($e->getMessage());
            }
        }
    }
}