<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.10.15
 * Time: 23:35
 */
class Avatar extends Image
{

    public function upload(Form $form)
    {
        try {

            $this->setSuffix(AvatarEnum::getUpload());

            if (!file_exists($path = $this->getImagesTmpPath() . $this->getProfile()))
                mkdir($path, 0755, true);

            $upload = $this->getImagePath();

            FileUtils::upload(
                $form->get('avatar')->getValue(),
                $upload
            );

            $this->setSuffix(AvatarEnum::getSource());
            $this->setSource($this->getImagePath());

            copy($upload, $this->getImagePath());

        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function getImagePath()
    {
        return $this->getImagesTmpPath() .
        $this->getProfile() . DIRECTORY_SEPARATOR . $this->getFileName() . '_' .
        $this->getSuffix()->getName() . '.' . $this->getFileType()->getExtension();
    }

    public function geTmpUrl()
    {
        return URL_PROJECT_IMAGE . 'profile-avatar' . DIRECTORY_SEPARATOR .
        'tmp' . DIRECTORY_SEPARATOR . $this->getProfile() . DIRECTORY_SEPARATOR .
        $this->getFileName() . '_' . $this->getSuffix()->getName() . '.' .
        $this->getFileType()->getExtension().'?'.mt_rand();
    }

    private function getImagesTmpPath()
    {
        return PATH_PROJECT_IMAGE . 'profile-avatar' . DIRECTORY_SEPARATOR .
        'tmp' . DIRECTORY_SEPARATOR;
    }


}