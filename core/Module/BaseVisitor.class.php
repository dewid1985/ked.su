<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 11.09.15
 * Time: 21:02
 */

namespace Module
{
    abstract class BaseVisitor extends \BaseCore implements  IVisitor{

        public $request;

        public $response;

        /**
         * @return mixed
         */
        public function getRequest()
        {
            return $this->request;
        }

        /**
         * @param $request
         * @return $this
         */
        public function setRequest($request)
        {
            $this->request = $request;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getResponse()
        {
            return $this->response;
        }

        /**
         * @param $response
         * @return $this
         */
        public function setResponse($response)
        {
            $this->response = $response;
            return $this;
        }
    }
}