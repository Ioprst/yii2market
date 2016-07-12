<?php

namespace common\models;

use Yii;
use common\models\User;
use yii\behaviors\TimeStampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\FileHelper;

class Essence extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimeStampBehavior::className(),
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
}
