<?php

/***************************************************************************
 *   Метод мапед Контроллер                                                *
 * @author Schon Dewid  2015                                             *
 ***************************************************************************/
abstract class AppMethodMappedController extends CoreBasicMethodMappedController
{

    use ResponseViewError;

    private $ajaxRequestVar = 'HTTP_X_REQUESTED_WITH';
    private $ajaxRequestValueList = array('XMLHttpRequest');
    private $pjaxRequestVar = 'HTTP_X_PJAX';

    protected $form;

    protected $configMessages = 'Messages';

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }


    public function importErrorForm($formName)
    {
        /** @var array $formValidationConfig */
        $formValidationConfig = AppConfig::create()
            ->setConfig(
                ucfirst($formName)
            )
            ->getAllConfig();

        foreach ($this->getForm()->getPrimitiveNames() as $value) {

            if ($value == 'formName')
                continue;

            $primitive = $this->getForm()->getPrimitiveList()[$value];

            if ($primitive instanceof RangedPrimitive)
                $primitive->setMin(5);

            if (
                !is_null($formValidationConfig[$value]['primitiveSettings'])
                && is_array($formValidationConfig[$value]['primitiveSettings'])
            ) {
                foreach ($formValidationConfig[$value]['primitiveSettings'] as $k => $v) {
                    switch ($k) {
                        case 'min': {
                            $primitive->setMin($v);
                        }
                    }
                }
            }

            if (
                !is_null($formValidationConfig[$value]['pattern'])
                && $primitive instanceof PrimitiveString
            ) {
                $primitive->setAllowedPattern($formValidationConfig[$value]['pattern']);
            }

            if (!is_null($customLabel = $formValidationConfig[$value]['addCustomLabel']))
                $this->getForm()->addCustomLabel($value, Form::WRONG, $customLabel['error']);

            if (!is_null($missingLabel = $formValidationConfig[$value]['addMissingLabel']))
                $this->getForm()->addMissingLabel($value, $missingLabel['error']);

        }

    }


    public function assembleRequest(HttpRequest $http, BaseRequest $request)
    {
        $this->setForm($request->proto()->makeForm());
        FormUtils::object2form($http, $this->getForm());
        if ($this->isPostVar($http, 'formName'))
            $this->importErrorForm($http->getPostVar('formName'));
        $this->getForm()->importMore($http->getPost())->importMore($http->getGet());
        $this->getForm()->checkRules();

        if ($this->getForm()->getErrors())
            return $this->getMavError($this->getForm());

        FormUtils::form2object($this->getForm(), $request);

        return $request;
    }


    /**
     * @param HttpRequest $request
     *
     * @return ModelAndView
     */
    public function handleRequest(HttpRequest $request)
    {
        return parent::handleRequest($request);
    }

    /**
     * @param HttpRequest $request
     *
     * @return null
     */
    public function chooseAction(HttpRequest $request)
    {

        $action = Primitive::choice('action')->setList($this->getMethodMapping());
        if ($this->getDefaultAction())
            $action->setDefault($this->getDefaultAction());
        Form::create()
            ->add($action)
            ->import($request->getGet())
            ->importMore($request->getPost())
            ->importMore($request->getAttached());
        if (!$command = $action->getValue())
            return $action->getDefault();

        return $command;
    }

    /**
     * @return boolean
     */
    public function isAjaxRequest(HttpRequest $request)
    {
        $form = Form::create()
            ->add(
                Primitive::plainChoice($this->ajaxRequestVar)
                    ->setList($this->ajaxRequestValueList)
            )
            ->add(
                Primitive::boolean('_isAjax')
            )
            ->import($request->getServer())
            ->importOneMore('_isAjax', $request->getGet());

        if ($form->getErrors()) {
            return false;
        }
        if ($form->getValue($this->ajaxRequestVar)) {
            return true;
        }
        if ($form->getValue('_isAjax')) {
            return true;
        }
        return false;
    }

    /**
     * @return boolean
     */
    function isPjaxRequest(HttpRequest $request)
    {
        $form = Form::create()
            ->add(
                Primitive::boolean($this->pjaxRequestVar)
            )
            ->add(
                Primitive::boolean('_isPjax')
            )
            ->import($request->getServer())
            ->importOneMore('_isPjax', $request->getGet());

        if ($form->getErrors()) {
            return false;
        }
        return $form->getValue($this->pjaxRequestVar) || $form->getValue('_isPjax');
    }

    protected function isPostVar(HttpRequest $httpRequest, $var)
    {
        try {
            $httpRequest->getPostVar($var);
            return true;
        } catch (Exception $e) {
            /**  */
        }
        return false;
    }

    protected function isGetVar(HttpRequest $httpRequest, $var)
    {
        try {
            $httpRequest->getGetVar($var);
            return true;
        }catch (Exception $r)
        {
            /**  */
        }

        return false;
    }

    public function notFound()
    {
        return ModelAndView::create()
            ->setView('errors/404')
            ->setModel(Model::create());
    }

    protected function getMessages($keyArray)
    {
        return AppConfig::create()->setConfig($this->configMessages)->getItemConfig($keyArray);
    }
}