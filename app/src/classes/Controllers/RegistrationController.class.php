<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.10.15
 * Time: 20:36
 */
class RegistrationController extends AppMethodMappedController
{

    public function registrationAction(HttpRequest $httpRequest)
    {
        if ($this->isAjaxRequest($httpRequest)) {

            $waiting = new WaitingRegistration();
            $request = $this->assembleRequest($httpRequest, RegistrationRequest::create());
            $double = null;

            if ($request instanceof ModelAndView)
                return $request;

            /**@var RegistrationRequest $request */

            if ($request->getPassword() != $request->getPasswordConfirm())
                return ModelAndView::create()
                    ->setModel(
                        Model::create()
                            ->set('success', false)
                            ->set('error', 'Введенные пароли разные')
                    )
                    ->setView(JsonView::create());

            $timestampTZ = TimestampTZ::makeNow();
            $password = password_hash(
                $request->getPassword(),
                PASSWORD_DEFAULT
            );

            $waiting
                ->setEmail($request->getEmail())
                ->setPassword($password)
                ->setRegistrationAt($timestampTZ)
                ->setToken(md5($request->getEmail() . $timestampTZ->toString()))
                ->setQueueEmail(true);

            try {
                $waiting->dao()->add($waiting);
            } catch (PostgresDatabaseException $e) {
                $double = $waiting->getWaitingByRegistrationRequest($request);

            };

            if ($double instanceof WaitingRegistration && $double->isConfirm()) {
                Session::assign('email', $double->getEmail());
                return ModelAndView::create()
                    ->setModel(
                        $this
                            ->getModel()
                            ->set('redirect', 'l-forget-registered-user')
                    )
                    ->setView(
                        JsonView::create()
                    );
            }

            if ($double instanceof WaitingRegistration) {
                Session::assign('email', $double->getEmail());
                return ModelAndView::create()
                    ->setModel(
                        $this
                            ->getModel()
                            ->set('redirect', 'l-forget-double')
                    )
                    ->setView(
                        JsonView::create()
                    );
            }

            return ModelAndView::create()
                ->setView(JsonView::create())
                ->setModel(
                    $this
                        ->getModel()
                        ->set('success', true)
                        ->set('redirect', 'l-registration-confirm')
                );
        } else {
            return $this->notFound();
        }
    }

    public function repeatAction(HttpRequest $httpRequest)
    {
        $waitingRegistration = WaitingRegistration::dao()
            ->getWaitingByRegistrationRequest(
                RegistrationRequest::create()
                    ->setEmail(Session::get('email'))
            );

        $waitingRegistration
            ->setQueueEmail(true);

        $waitingRegistration->dao()->save($waitingRegistration);

        return ModelAndView::create()
            ->setModel(
                $this
                    ->getModel()
                    ->set('success', true)
                    ->set('redirect', 'l-registration-confirm')
            )
            ->setView(
                JsonView::create()
            );
    }

    public function confirmAction(HttpRequest $httpRequest)
    {
        if ($this->isGetVar($httpRequest, 'confirm-token')) {
            return $this->confirmUser($httpRequest);
        } else {
            return $this->notFound();
        }
    }

    private function confirmUser(HttpRequest $httpRequest)
    {
        $user = new User();

        /** @var WaitingRegistration $waiting */
        $waiting = WaitingRegistration::dao()
            ->getByToken($httpRequest->getGetVar('confirm-token'));

        if (!$waiting)
            return $this->notFound();

        if ($waiting->isConfirm())
            return $this->notFound();

        User::dao()->add(
            $user
                ->setPassword($waiting->getPassword())
                ->setEmail($waiting->getEmail())
        );

        WaitingRegistration::dao()
            ->save(
                $waiting
                    ->setConfirm(true)
                    ->setConfirmationAt(TimestampTZ::makeNow())
            );

        return ModelAndView::create()
            ->setModel(
                Model::create()
                    ->set('success', true)
                    ->set('redirect', 'l-user-confirm')
            )
            ->setView(
                'login'
            );
    }

    protected function getMapping()
    {
        return [
            'registration' => 'registrationAction',
            'repeat' => 'repeatAction',
            'confirm' => 'confirmAction'
        ];
    }
}