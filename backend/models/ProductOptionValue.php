<?php

namespace backend\models;

use Yii;

use backend\models\Option;
use backend\models\OptionValue;
/**
 * This is the model class for table "product_option_value".
 *
 * @property integer $id
 * @property integer $tProduct
 * @property integer $tOption
 * @property integer $tValue
 */
class ProductOptionValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_option_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tProduct', 'tOption', 'tValue'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tProduct' => 'T Product',
            'tOption' => 'T Option',
            'tValue' => 'T Value',
        ];
    }

    public static function getOptionsValues($productId) {
        $result = [];

        $productOptionValues = ProductOptionValue::find()->where(['tProduct'=>$productId])->all();
        foreach ($productOptionValues as $productOptionValue) {
            $tOption = $productOptionValue->tOption;
            $tValue = $productOptionValue->tValue;

            $result[]= [
                'option'=> Option::findOne($tOption),
                'value'=> OptionValue::findOne($tValue),
            ];
        }
        return $result;
    }
}
