<?php

/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 19.08.15
 * Time: 9:29
 */
trait ResponseViewError
{

    protected $model;

    /**
     * @return Model
     */
    public function getModel()
    {
        if (is_null($this->model))
            $this->model =
                Model::create()
                    ->set('success', false)
                    ->set('redirect', false)
            ;

        return $this->model;
    }


    public function getMavError(Form $form)
    {
        foreach ($form->getPrimitiveNames() as $primitiveNames) {

            if ($form->getError($primitiveNames)) ;
            $this->getModel()->set(
                $primitiveNames,
                $form->getTextualErrorFor($primitiveNames)
            );
        }

        return ModelAndView::create()
            ->setView(JsonView::create())
            ->setModel($this->getModel());
    }
}