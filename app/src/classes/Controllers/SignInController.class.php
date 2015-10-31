<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.10.15
 * Time: 23:44
 */
class SignInController extends AppMethodMappedController
{

    public function indexAction(HttpRequest $httpRequest)
    {
        if(!$this->isAjaxRequest($httpRequest))
            return $this->notFound();

        $request = $this->assembleRequest($httpRequest, SignInRequest::create());

        if ($request instanceof ModelAndView)
            return $request;

        /** @var SignInRequest $request */
        User::authUser($request, $httpRequest);

        return ModelAndView::create()
            ->setModel($this->getModel()->set('success', true))
            ->setView(JsonView::create());
    }

    protected function getMapping()
    {
        return [
            'index' => 'indexAction'
        ];
    }
}