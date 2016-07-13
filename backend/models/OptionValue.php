<?php

namespace backend\models;
use common\models\Essence;
use Yii;

/**
 * This is the model class for table "option_values".
 *
 * @property integer $id
 * @property string $text
 * @property integer $dCreate
 * @property integer $dUpdate
 * @property integer $tUserCreate
 * @property integer $tUserUpdate
 */
class OptionValue extends Essence
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dCreate', 'dUpdate', 'tUserCreate', 'tUserUpdate'], 'integer'],
            [['text'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'dCreate' => 'D Create',
            'dUpdate' => 'D Update',
            'tUserCreate' => 'T User Create',
            'tUserUpdate' => 'T User Update',
        ];
    }
}
