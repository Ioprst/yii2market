<?php

namespace backend\models;
use backend\models\OptionValue;

use Yii;

use common\models\Essence;

/**
 * This is the model class for table "option".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $dCreate
 * @property integer $dUpdate
 * @property integer $dDelete
 * @property integer $dUserCreate
 * @property integer $dUserUpdate
 * @property integer $dUserDelete
 */
class Option extends Essence
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['dCreate', 'dUpdate', 'tUserCreate', 'tUserUpdate'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'dCreate' => 'Дата создания',
            'dUpdate' => 'Дата обновления',
            'tUserCreate' => 'Создал',
            'tUserUpdate' => 'Изменил',
        ];
    }

    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::className(), ['tOption' => 'id']);
    }

}
