<?php

/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 19.09.15
 * Time: 22:06
 */
abstract class AuthUserController extends AppMethodMappedController
{

    public function handleRequest(HttpRequest $httpRequest)
    {
        $action = $this->chooseAction($httpRequest);

        if (in_array($action, $this->getFreeMethods()))
            return parent::handleRequest($httpRequest);

        Admin::me()->checkAdminAuth();

        if (Admin::me()->isAuth())
            return parent::handleRequest($httpRequest);

        if ($this->isAjaxRequest($httpRequest) || $this->isPjaxRequest($httpRequest))
            return
                ModelAndView::create()
                    ->setView(JsonPView::create())
                    ->setModel(
                        Model::create()
                            ->set('auth', 'no user authorization')
                    );
        else
            return ModelAndView::create()
                ->setModel(Model::create())
                ->setView(RedirectView::create('/admin/index'));

    }


    abstract protected function getFreeMethods();

}