<?php

namespace app\models;

use ra\admin\models\Form;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Form
{
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['name', 'email', 'phone'], 'required'],
            ['phone', 'match', 'pattern' => '/^[-+0-9()\s]+$/'],
            ['phone', 'string', 'length' => [7, 24]],
            ['email', 'email'],
            [['file'], 'file'],
            [['fromUrl', 'text'], 'safe'],
        ]);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'имя',
            'email' => 'e-mail',
            'phone' => 'телефон',
            'text' => 'текст сообщения',
            'fromUrl' => 'С адреса',
        ];
    }

    public function afterValidate()
    {
        $this->uploadFiles('file', '@app/runtime/formUploads/' . date('Y-m-d') . '/');
        parent::afterValidate();
    }

    public function beforeSend($mail)
    {
        if ($this->file) foreach ($this->file as $file)
            $mail->attach($file->tempName, [
                'fileName' => $file->name,
                'contentType' => $file->type,
            ]);
    }
}
