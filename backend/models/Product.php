<?php

namespace backend\models;

use Yii;
use common\models\Essence;
use  backend\models\ProductCategory;
/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $weight
 * @property string $color
 * @property integer $count
 * @property integer $price
 * @property integer $tCategory
 * @property integer $dCreate
 * @property integer $dUpdate
 * @property integer $tUserCreate
 * @property integer $tUserUpdate
 */
class Product extends Essence
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description', 'color'], 'string'],
            [['weight', 'count', 'price', 'tCategory', 'dCreate', 'dUpdate', 'tUserCreate', 'tUserUpdate'], 'integer'],
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
            'weight' => 'Вес    ',
            'color' => 'Цвет',
            'count' => 'Количество',
            'price' => 'Цена',
            'tCategory' => 'Категория',
            'dCreate' => 'Дата создания',
            'dUpdate' => 'Дата обновления',
            'tUserCreate' => 'Создал',
            'tUserUpdate' => 'Изменил',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'tCategory']);
    }
}
