<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.10.15
 * Time: 23:36
 */
abstract class Image extends AppBase
{
    /**
     * @var MimeType $fileType
     * @var AvatarEnum $suffix
     */
    protected
        $profile,
        $width,
        $height,
        $fileName,
        $fileType,
        $source,
        $suffix;

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param $fileName
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return MimeType
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param $fileType
     * @return $this
     */
    public function setFileType(MimeType $fileType)
    {
        $this->fileType = $fileType;
        return $this;
    }

    /**
     * @return AvatarEnum
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param AvatarEnum $suffix
     * @return $this
     */
    public function setSuffix(AvatarEnum $suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param $profile
     * @return $this
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
        return $this;
    }


    public abstract function getImagePath();

    public function resize()
    {
        $source = null;
        $image = getimagesize($this->getSource());
        $settingsSize = $this->getSuffix()->getSizes();
        $markWidth = $settingsSize['width'];
        $markHeight = $settingsSize['height'];

        $this->setFileType(MimeType::getByMimeType($image['mime']));
        $this->setWidth($image[0]);
        $this->setHeight($image[1]);


        $percent = $markWidth / $this->getWidth();

        $thumb = imagecreatetruecolor($this->getWidth() * $percent, $this->getHeight() * $percent);

        switch ($this->getFileType()->getExtension()) {
            case 'jpg':
                $source = imagecreatefromjpeg($this->getSource());
                break;
            case 'jpeg':
                $source = imagecreatefromjpeg($this->getSource());
                break;
            case 'png':
                $source = imagecreatefrompng($this->getSource());
                break;
        }


        imagecopyresampled(
            $thumb, $source, 0, 0, 0, 0,
            $this->getWidth() * $percent, $this->getHeight() * $percent, $this->getWidth(), $this->getHeight());


        switch ($this->getFileType()->getExtension()) {
            case 'jpeg' || 'jpg':
                imagejpeg($thumb, $this->getImagePath(), 100);
                break;
            case 'png':
                imagepng($thumb, $this->getImagePath(), 100);
                break;
        }
        imagedestroy($thumb);
    }

    public function crop(HttpRequest $httpRequest)
    {
        $source = null;
        $avatarFile = $this->getImagePath();

        $this->setSuffix(AvatarEnum::getPrepared());
        switch ($this->getFileType()->getExtension()) {
            case 'jpeg' || 'jpg':
                $source = imagecreatefromjpeg($this->getImagePath());
                break;
            case 'png':
                $source = imagecreatefrompng($this->getImagePath());
                break;
        }

        $sizes = AvatarEnum::getAvatar()->getSizes();
        $thumb = imagecreatetruecolor($sizes['width'], $sizes['height']);

        imagecopyresampled(
            $thumb,
            $source,
            0,
            0,
            $httpRequest->getPostVar('x'),
            $httpRequest->getPostVar('y'),
            $sizes['width'],
            $sizes['height'],
            $httpRequest->getPostVar('w'),
            $httpRequest->getPostVar('h')
        );

        $this->setSuffix(AvatarEnum::getAvatar());

        switch ($this->getFileType()->getExtension())
        {
            case 'jpg' || 'jpeg':
                imagejpeg($thumb, $this->getImagePath(), 100);
                break;
            case 'png';
                imagepng($thumb, $this->getImagePath(), 100);
                break;
        }

        imagedestroy($thumb);


//        $source = $this->prepareImageResizeAndCrop($imageSource);
//        $thumb = imagecreatetruecolor((integer)$this->getWidth(), (integer)$this->getHeight());
//
//        imagecopyresampled(
//            $thumb,
//            $source,
//            0,
//            0,
//            $imagePrepared->getCoordinateX(),
//            $imagePrepared->getCoordinateY(),
//            (integer)$this->getWidth(),
//            (integer)$this->getHeight(),
//            $imagePrepared->getWidth(),
//            $imagePrepared->getHeight()
//        );
//
//        switch ($imageSource->getMimeType()) {
//            case 'image/jpeg':
//                return imagejpeg($thumb,$imageSource->getSourceFileName(), 100);
//            case 'image/gif':
//                return imagegif($thumb, $imageSource->getSourceFileName(), 100);
//            case 'image/png':
//                return imagepng($thumb, $imageSource->getSourceFileName(), 100);
//        }
    }
//
//
//    /**
//     * @param ImageSource $image
//     * @return resource
//     */
//    private function prepareImageResizeAndCrop(ImageSource $image)
//    {
//        switch ($image->getMimeType()) {
//            case 'image/jpeg':
//                return imagecreatefromjpeg($image->getSourceFileName());
//            case 'image/gif':
//                return imagecreatefromgif($image->getSourceFileName());
//            case 'image/png':
//                return imagecreatefrompng($image->getSourceFileName());
//        }
//    }
}