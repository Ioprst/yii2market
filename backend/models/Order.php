<?php

namespace backend\models;

use Yii;

use backend\models\Product;
use common\models\Essence;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $tProduct
 * @property string $description
 * @property integer $count
 * @property integer $status
 * @property integer $dCreate
 * @property integer $dUpdate
 * @property integer $tUserCreate
 * @property integer $tUserUpdate
 */
class Order extends Essence
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tProduct', 'count', 'status', 'dCreate', 'dUpdate', 'tUserCreate', 'tUserUpdate'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tProduct' => 'Товар',
            'description' => 'Комментарий',
            'count' => 'Количество',
            'status' => 'Статус',
            'dCreate' => 'Дата создания',
            'dUpdate' => 'Дата обновления',
            'tUserCreate' => 'Создал',
            'tUserUpdate' => 'Изменил',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'tProduct']);
    }

    public static function getStatusMap(){
        return [
            1 => 'Покупка отменена',
            2 => 'Товар доставлен'
        ];
    }
}
