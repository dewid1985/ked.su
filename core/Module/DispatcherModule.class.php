<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 09.09.15
 * Time: 9:15
 */

namespace Module {

    abstract class DispatcherModule extends \BaseCore implements IModule
    {

        abstract public function getOperation();

        abstract public function setOperation(BaseOperation $operation);

        public function init()
        {
            $path = str_replace("\\", "/", $this->getNamespaceThis());
            $this->getOperation()->getRequest();

            /** @var \CoreConfig $config */
            $config = \CoreConfig::create()
                ->setConfigPath(
                    PATH_CORE_BASE . $path . DIRECTORY_SEPARATOR . "Config" . DIRECTORY_SEPARATOR
                )
                ->setConfig(
                    $this->getOperation()->getOperationObjectName()
                );

            /** @var string $requestObjectName */
            $requestObjectName = $config->getItemConfig('RequestObjectName');

            /** @var string $responseObjectName */
            $responseObjectName = $config->getItemConfig('ResponseObjectName');

            $requestObject = new $requestObjectName;
            $responseObject = new $responseObjectName;

            if ($this->getOperation()->getRequest() instanceof $requestObject)
                $this->visitorRequest($config->getItemConfig('Visitors'));

            $this->getOperation()->process();

            if ($this->getOperation()->getResponse() instanceof $responseObject)
                $this->visitorResponse($config->getItemConfig('Visitors'));

            return $this;
        }

        public function visitorRequest(array $visitors)
        {
            foreach ($visitors['Request'] as $k => $visitor) {
                $visitor = $this->getNamespaceThis().'\\Visitor\\'
                    .$this->getOperation()->getOperationObjectName().'\\'.
                    $visitor;
                /** @var BaseVisitor $visitorObject */
                $visitorObject = new $visitor;
                $visitorObject->setRequest($this->getOperation()->getRequest());
                $visitorObject->visit();
            }
        }

        public function visitorResponse(array $visitors)
        {
            foreach ($visitors['Response'] as $k => $visitor) {
                $visitor = $this->getNamespaceThis().'\\Visitor\\'
                    .$this->getOperation()->getOperationObjectName().'\\'.
                    $visitor;
                /** @var BaseVisitor $visitorObject */
                $visitorObject = new $visitor;
                $visitorObject->setRequest($this->getOperation()->getRequest());
                $visitorObject->visit();
            }
        }
    }
}