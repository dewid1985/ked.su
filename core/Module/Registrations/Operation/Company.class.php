<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 10.09.15
 * Time: 20:39
 */
namespace Module\Registrations\Operation {

    use Module\BaseOperation;

    class Company extends BaseOperation
    {

        /**
         * @return \CoreRegistrationCompanyResponse
         */
        public function getResponse()
        {
            return $this->response;
        }

        /**
         * @return \CoreRegistrationCompanyRequest
         */
        public function getRequest()
        {
            return $this->request;
        }

        public function process()
        {
            $link = \DBPool::me()->getLink();

            $request = $this->getResponse();

            $link->begin();

            try {

                $city = \CoreCity::dao()
                    ->getByCity($this->getRequest()->getCity());

                $user = \CoreUser::create();

                $userData =
                    \CoreUserData::dao()
                        ->add(
                            \CoreUserData::create()
                                ->setUser($user)
                                ->setEmail($this->getRequest()->getUserEmail())
                                ->setFirstName($this->getRequest()->getUserFirstName())
                                ->setMiddleName($this->getRequest()->getUserMiddleName())
                                ->setLastName($this->getRequest()->getUserLastName())
                                ->setPhone($this->getRequest()->getUserPhone())
                        );

                $link->commit();
            } catch (\BaseException $e) {
                print_r($e->getMessage());
                $link->rollback();
            }

        }

    }
}