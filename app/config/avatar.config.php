<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22.10.15
 * Time: 9:20
 */

return [
    SuffixAvatarEnum::getAvatar()->getId() => [
        'width' => 512,
        'height' => 515
    ],
    SuffixAvatarEnum::getPrepared()->getId() => [
        'width' => 600,
        'height' => 800
    ],
    SuffixAvatarEnum::getSource()->getId() => [
        'width' => null,
        'height' => null
    ],
    SuffixAvatarEnum::getUpload()->getId() => [
        'width' => null,
        'height' => null
    ]
];