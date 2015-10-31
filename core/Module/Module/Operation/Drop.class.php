<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 01.10.15
 * Time: 0:00
 */

namespace Module\Module\Operation {

    use Module\BaseOperation;

    class Drop extends BaseOperation
    {

        /**
         * @return \CoreDropModuleOperationResponse
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
                $module = \CoreModule::dao()
                    ->getById(
                        $this
                            ->getRequest()
                            ->getId()
                    );


                /** @var \CoreOperation $object */
                foreach ($module->getOperations() as $object) {
                    $object->dao()->drop($object);
                };

                $module->dao()->drop($module);


                $this->getResponse()->setSuccess(true);
            } catch (\BaseException $e) {
                $this->getResponse()->setError($e->getMessage());
            }
        }

    }

}