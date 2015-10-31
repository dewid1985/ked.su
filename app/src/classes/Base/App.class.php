<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.04.15
 * Time: 15:06
 */
class App extends AppBase
{

    private static $instance = null;

    private $config = null;

    /**
     * @return AppConfig
     */
    public function getConfig()
    {
        if (is_null($this->config))
            $this->config = AppConfig::create()->setConfig('base');
        return $this->config;
    }


    public static function me()
    {

        if(is_null(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }

    public static function getBaseUrl()
    {
        return AppConfig::create()
            ->setConfig('base')
            ->getItemConfig('baseUrl');
    }

    public function initDB()
    {
        $dataBaseConnection =
            $this->getConfig()->getItemConfig('dataBasesConnection');

        DBPool::me()
            ->setDefault(
                DB::spawn(
                    $dataBaseConnection['connector'],
                    $dataBaseConnection['user'],
                    $dataBaseConnection['password'],
                    $dataBaseConnection['host'],
                    $dataBaseConnection['databases']
                )
                    ->setEncoding(DEFAULT_ENCODING)
            );

        return $this;
    }
}