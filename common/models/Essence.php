<?php

namespace common\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\FileHelper;

class Essence extends \yii\db\ActiveRecord
{
    public $photo_file;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'dCreate',
                'updatedAtAttribute' => 'dUpdate',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'tUserCreate',
                'updatedByAttribute' => 'tUserUpdate',
            ],
        ];
    }

    public function getUserCreate()
    {
        return $this->hasOne(User::className(), ['id' => 'tUserCreate']);
    }

    public function getUserUpdate()
    {
        return $this->hasOne(User::className(), ['id' => 'tUserUpdate']);
    }

    function uploadPhoto()
    {
        if (!$this->photo_file) {
            return false;
        }

        $uploadPath = $this->getPhotoUploadUrl(true);

        FileHelper::removeDirectory($uploadPath);
        FileHelper::createDirectory($uploadPath);

        $filename   = $this->photo_file->baseName;
        $orig       = $uploadPath . '/' . iconv('utf-8', 'windows-1251', $filename) . '.' . $this->photo_file->extension;

        $uploadlink = $this->getPhotoUploadUrl().'/'.$filename . '.' . $this->photo_file->extension;

        $this->photo_file->saveAs($orig);

        if (!$this->photo || $this->photo !== $uploadlink) {
            $this->photo =  $uploadlink;
            $this->save(false);
        }
        return true;
    }

    public function getPhotoUploadUrl($absulute = false) {
        $folder= static::tableName();
        $uploadUrl = $folder.'/'. $this->id;
        return $absulute ? Yii::getAlias('@frontend').'/web/uploads/'.$uploadUrl : '/uploads/'.$uploadUrl;
    }

}
