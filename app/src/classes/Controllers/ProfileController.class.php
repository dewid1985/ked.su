<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.10.15
 * Time: 10:12
 */
class ProfileController extends AppMethodMappedController
{

    public function registrationAction(HttpRequest $request)
    {
        return ModelAndView::create()
            ->setModel(Model::create())
            ->setView('user/registration');
    }

    public function uploadAvatarAction(HttpRequest $request)
    {
        $form = Form::create()
            ->set(
                Primitive::file('avatar')
                    ->setAllowedMimeTypes(
                        [
                            MimeType::wrap(272)->getMimeType(),
                            MimeType::wrap(375)->getMimeType(),
                            MimeType::wrap(274)->getMimeType()
                        ]
                    )
            )
            ->addCustomLabel(
                'avatar',
                Form::WRONG,
                'На аватар разрешено загружать фото формата jpeg, png, jpg'
            )
            ->import(
                $request->getFiles()
            );


        if ($form->getError('avatar')) {
            return ModelAndView::create()
                ->setModel(
                    $this
                        ->getModel()
                        ->set('error', $form->getTextualErrorFor('avatar'))
                )
                ->setView(JsonView::create());
        }

        $avatar = Avatar::create()
            ->setFileName(
                crc32(
                    $request->getCookieVar('profile_id')
                )
            )
            ->setProfile(
                crc32(
                    $request->getCookieVar('profile_id')
                )
            )
            ->setFileType(
                MimeType::getByMimeType(
                    $request->getFilesVar('avatar')['type']
                )
            );


        if ($avatar->upload($form))
        {
            $avatar->setSuffix(AvatarEnum::getPrepared())->resize();
            $avatar->setSuffix(AvatarEnum::getAvatar())->resize();

            return ModelAndView::create()
                ->setModel(
                    Model::create()
                        ->set('success', true)
                        ->set('uploadImage', $avatar->geTmpUrl())
                        ->set('imagePrepared', $avatar->setSuffix(AvatarEnum::getPrepared())->geTmpUrl())
                        ->set('mime', $avatar->getFileType()->getExtension())
                )
                ->setView(JsonView::create());
        }

    }

    public function cropAction(HttpRequest $httpRequest)
    {
        $avatar = new Avatar();
        $avatar
            ->setFileName(crc32($httpRequest->getCookieVar('profile_id')))
            ->setProfile(crc32($httpRequest->getCookieVar('profile_id')))
            ->setSuffix(AvatarEnum::getPrepared())
            ->setFileType(MimeType::getByExtension($httpRequest->getPostVar('mime')))
            ->crop($httpRequest);

        return ModelAndView::create()
            ->setModel(
                Model::create()
                    ->set('success', true)
                    ->set('uploadImage', $avatar->geTmpUrl())
            )
            ->setView(JsonView::create());
    }

    protected function getMapping()
    {
        return [
            'registration' => 'registrationAction',
            'uploadAvatar' => 'uploadAvatarAction',
            'crop' => 'cropAction'
        ];
    }

    protected function getFreeMethods()
    {
        // TODO: Implement getFreeMethods() method.
    }
}