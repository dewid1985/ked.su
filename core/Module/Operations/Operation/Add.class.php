<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 10.09.15
 * Time: 20:39
 */
namespace Module\Operations\Operation {

    use Module\BaseOperation;

    class Add extends BaseOperation
    {

        /**
         * @return \CoreBaseResponse
         */
        public function getResponse()
        {
            return $this->response;
        }

        /**
         * @return \CoreAddModuleOperationRequest
         */
        public function getRequest()
        {
            return $this->request;
        }

        public function process()
        {
            try {

                $operation = new \CoreOperation();

                $operation
                    ->setName($this->getRequest()->getModuleOperationName())
                    ->setDescription($this->getRequest()->getModuleOperationDescription());;

                if ($this->getRequest()->getModuleId())
                    $operation->setModuleId(
                        $this->getRequest()->getModuleId()
                    );

                $operation->dao()->add($operation);

                return $this->getResponse()->setSuccess(true);
            } catch (\BaseException $e) {
                return $this->getResponse()->setError($e->getMessage());
            }
        }
    }
}