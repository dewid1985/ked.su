<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 09.09.15
 * Time: 21:18
 */

namespace Module {
    abstract class BaseOperation implements IOperation{

        /** @var  \CoreBaseRequest*/
        public $request;

        /** @var  \CoreBaseResponse */
        public $response;

        /**
         * @return \CoreBaseRequest
         */
        public function getRequest()
        {
            return $this->request;
        }

        /**
         * @param \CoreBaseRequest $request
         * @return $this
         */
        public function setRequest(\CoreBaseRequest $request)
        {
            $this->request = $request;
            return $this;
        }

        /**
         * @return \CoreBaseResponse
         */
        public function getResponse()
        {
            return $this->response;
        }

        /**
         * @param \CoreBaseResponse $response
         * @return $this
         */
        public function setResponse(\CoreBaseResponse $response)
        {
            $this->response = $response;

            return $this;
        }

        public function getOperationObjectName()
        {
            $objectName = get_called_class();

            return array_slice(explode("\\",$objectName),-1)[0];
        }

        /**
         * @return \Model
         */
        public function getModel()
        {
            $model = \Model::create();

            foreach($this->getResponse()->proto()->getPropertyList() as $name => $object)
            {
                /**@var \LightMetaProperty $object */

                $getter = $object->getGetter();

                $model->set(
                    $object->getName(), $this->getResponse()->$getter()
                );
            }

            return $model;
        }
    }
}