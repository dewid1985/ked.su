<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.04.15
 * Time: 0:50
 */



class InsertLocation
{
    protected $xmlFile = "rocid.xml";

    protected $countryName = null;

    protected $countryId = null;

    protected $countryIdXml = null;

    protected $regionId = null;

    protected $regionIdXml = null;

    /** @var  SimpleXMLElement */
    protected $XMLElement;

    protected $link;

    public static function create()
    {
        return new static();
    }

    /**
     * @return null
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * @param null $regionId
     */
    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;
    }

    /**
     * @return null
     */
    public function getRegionIdXml()
    {
        return $this->regionIdXml;
    }

    /**
     * @param null $regionIdXml
     */
    public function setRegionIdXml($regionIdXml)
    {
        $this->regionIdXml = $regionIdXml;
    }

    /**
     * @return null
     */
    public function getCountryIdXml()
    {
        return $this->countryIdXml;
    }

    /**
     * @param null $countryIdXml
     */
    public function setCountryIdXml($countryIdXml)
    {
        $this->countryIdXml = $countryIdXml;
    }

    /**
     * @return SimpleXMLElement
     */
    private function getXMLElement()
    {
        return $this->XMLElement;
    }

    /**
     * @return null
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param null $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }


    /**
     * @param SimpleXMLElement $XMLElement
     */
    private function setXMLElement(SimpleXMLElement $XMLElement)
    {
        $this->XMLElement = $XMLElement;
    }

    function  __construct()
    {
        $this->setXMLElement(new SimpleXMLElement(file_get_contents($this->getXmlFile())));
    }

    /**
     * @return null
     */
    private function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param $countryName
     * @return $this
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @return string
     */
    private function getXmlFile()
    {
        return $this->xmlFile;
    }

    public function init()
    {
        $this->insertCountry();
    }

    protected function insertCountry()
    {
        $data = $this->getXMLElement()->xpath("/rocid/country/name[.='" . $this->getCountryName() . "']/parent::*");

        foreach ($data as $XMLElement) {
            $array = (array)$XMLElement;

            $this->setCountryId(
                CoreCountry::dao()
                    ->add(
                        CoreCountry::create()->setName($array['name'])
                    )
                    ->getId()
            );

            $this->setCountryIdXml($array['country_id']);
            $this->insertRegion();
        }
    }

    protected function insertRegion()
    {
        $data = $this->getXMLElement()->xpath("/rocid/region/country_id[.=" . $this->getCountryIdXml() . "]/parent::*");

        foreach ($data as $XMLElement) {
            $array = (array)$XMLElement;
            $this->setRegionId(
                CoreRegion::dao()
                    ->add(
                        CoreRegion::create()
                            ->setCountryId($this->getCountryId())
                            ->setName($array['name'])
                    )
                    ->getId()
            );

            $this->setRegionIdXml($array['region_id']);
            $this->insertCity();
        }
    }

    protected function insertCity()
    {
        $data = $this->getXMLElement()->xpath("/rocid/city/region_id[.=" . $this->getRegionIdXml() . "]/parent::*");

        foreach ($data as $XMLElement) {
            $array = (array)$XMLElement;
            CoreCity::dao()
                ->add(
                    CoreCity::create()
                        ->setCountryId($this->getCountryId())
                        ->setRegionId($this->getRegionId())
                        ->setName($array['name'])
                );
        }
    }

}

InsertLocation::create()
    ->setCountryName('Россия')
    ->init();

InsertLocation::create()
    ->setCountryName('Казахстан')
    ->init();

InsertLocation::create()
    ->setCountryName('Беларусь')
    ->init();

InsertLocation::create()
    ->setCountryName('Армения')
    ->init();


