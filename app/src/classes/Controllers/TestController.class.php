<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.10.15
 * Time: 23:25
 */
class TestController extends AppMethodMappedController
{

    /**
     * @return ModelAndView
     **/
    public function indexAction(HttpRequest $request)
    {
        return ModelAndView::create()
            ->setModel(Model::create())
            ->setView(JsonView::create());
    }

    protected function  getMapping()
    {
        return [
            'index' => 'indexAction'
        ];
    }
}