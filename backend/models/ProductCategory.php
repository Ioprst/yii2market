<?php

namespace backend\models;

use Yii;

use common\models\Essence;
/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $dCreate
 * @property integer $dUpdate
 * @property integer $tUserCreate
 * @property integer $tUserUpdate
 */
class ProductCategory extends Essence
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['dCreate', 'dUpdate', 'tUserCreate', 'tUserUpdate'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
}
