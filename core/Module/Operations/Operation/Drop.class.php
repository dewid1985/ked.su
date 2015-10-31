<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 01.10.15
 * Time: 0:00
 */

namespace Module\Operations\Operation {

    use Module\BaseOperation;

    class Drop extends BaseOperation
    {

        /**
         * @return \CoreDropOperationsOperationResponse
         */
        public function getResponse()
        {
            return parent::getResponse();
        }

        /**
         * @return \CoreDropModuleOperationRequest
         */
        public function getRequest()
        {
            return parent::getRequest();
        }

        public function process()
        {
            try {
                \CoreOperation::dao()
                    ->drop(
                        \CoreOperation::dao()
                            ->getById(
                                $this->getRequest()->getId()
                            )
                    );

                return $this->getResponse()->setSuccess(true);
            } catch (\BaseException $e) {
                return $this->getResponse()->setError($e->getMessage());
            }
        }

    }
}