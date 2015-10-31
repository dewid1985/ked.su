<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11.10.15
 * Time: 15:35
 */
class MainController extends AppMethodMappedController
{
    public function indexView(HttpRequest $httpRequest)
    {
        return ModelAndView::create()
            ->setModel(Model::create())
            ->setView('index');
    }


    public  function loginView(HttpRequest $httpRequest)
    {
        return ModelAndView::create()
            ->setModel($this->getModel())
            ->setView('login');
    }

    /**
     * Мапинг методов конроллера
     * Можно вернуть пустой массив если брать с учетом
     * что экшен будет тот который прописан в роут конфиге
     *
     * @return array
     */
    protected function /* array */
    getMapping()
    {
        return [
            'index' => 'indexView',
            'login' => 'loginView',
        ];
    }
}