<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 10.09.15
 * Time: 20:39
 */
namespace Module\Module\Operation {

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
         * @return \CoreAddModuleRequest
         */
        public function getRequest()
        {
            return $this->request;
        }

        public function process()
        {

         try {

             \CoreModule::dao()
                 ->add(
                     \CoreModule::create()
                         ->setName($this->getRequest()->getName())
                         ->setDescription($this->getRequest()->getDescription())
                 );

            $this->getResponse()->setSuccess(true);
         }catch (\BaseException $e)
         {
            $this->getResponse()->setError($e->getMessage());
         }
        }

    }
}