<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22.10.15
 * Time: 9:08
 */

class AvatarEnum extends  Enum
{
    const
        SUFFIX_UPLOAD = 1,
        SUFFIX_SOURCE = 2,
        SUFFIX_PREPARED = 3,
        SUFFIX_AVATAR = 4;

    protected static $names = [
        self::SUFFIX_UPLOAD => 'upload',
        self::SUFFIX_AVATAR => 'avatar',
        self::SUFFIX_PREPARED => 'prepared',
        self::SUFFIX_SOURCE => 'source'
    ];

    public $sizes = [
        self::SUFFIX_PREPARED => [
            'width'=> 400,
            'height' => 400
        ],
        self::SUFFIX_AVATAR => [
            'width' => 259,
            'height' => 259
        ]
    ];

    public static function getUpload()
    {
        return new self(self::SUFFIX_UPLOAD);
    }

    public static function getAvatar()
    {
        return new self(self::SUFFIX_AVATAR);
    }

    public static function getPrepared()
    {
        return new self(self::SUFFIX_PREPARED);
    }

    public static function getSource()
    {
        return new self(self::SUFFIX_SOURCE);
    }

    public function getSizes()
    {
        return $this->sizes[$this->getId()];
    }

}