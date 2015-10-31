<?php
/**
 * Created by PhpStorm.
 * User: dewid
 * Date: 28.08.15
 * Time: 19:04
 */

class Captcha extends BaseCore
{
    private $captchaPath;

    private $fontPath;

    private $font;

    private $width;

    private $height;

    private $img;

    private $urlDirectory;

    /**
     * Инициализирую каптчу
     *
     * @return $this
     */
    public function init()
    {
        $config = AppConfig::create()->setConfig('Captcha');
        $this->captchaPath = $config->getItemConfig('captcha_path');
        $this->fontPath = $config->getItemConfig('font_path');
        $this->font = $config->getItemConfig('font');
        $this->width = $config->getItemConfig('width');
        $this->height = $config->getItemConfig('height');
        $this->urlDirectory = $config->getItemConfig('captcha_url_image_directory');

        return $this;
    }

    private function _creation_captcha()
    {
        $this->img = imagecreatetruecolor( $this->width ,$this->height );
    }


    public function generateСaptcha ( $str )
    {
        $this->_creation_captcha();
        imagesavealpha( $this->img, true );
        $color_text = imagecolorallocate( $this->img, 51, 122, 183 );
        $background = imagecolorallocate( $this->img, 245, 245, 245 );
        imagefilledrectangle( $this->img, 0, 0, $this->width , $this->height, $background );
        $font = $this->fontPath.'/'.$this->font;
        imagettftext( $this->img, 14, 0, 15 , 23, $color_text, $font, $str );
        $image_name = date( 'YmdGis' );
        imagepng( $this->img, $this->captchaPath."/".$image_name.".png" );
        $this->_destroy();
        return "<img src= '".$this->urlDirectory."/".$image_name.".png"."' class='img-thumbnail'>";
    }

    private function _destroy()
    {
        imagedestroy( $this->img );
    }

    static function isCaptcha(HttpRequest $request)
    {
        if ($request->getPostVar('captcha')!=Session::get('captcha'))
        {
            throw new KedCaptchaException(
                KedConfig::create()
                    ->setConfig('exceptionMessage')
                    ->getItemConfig(__FUNCTION__)
            );
        }
    }
}