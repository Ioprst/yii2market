<?php

namespace backend\models;

use Yii;

use common\models\Essence;
use  backend\models\Category;
use backend\models\Option;
use backend\models\OptionValue;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
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
            ['photo_file', 'image', 'skipOnEmpty' => false, 'on'=> ['create']],
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
            'photo' => 'Фото',
            'photo_file' => 'Фото',
        ];
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->photo_file = UploadedFile::getInstance($this, 'photo_file');
            return true;
        }

        return false;
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'tCategory']);
    }

    public function getOptions() {
        return $this->hasMany(Option::className(), ['id' => 'tOption'])
      ->viaTable('product_option_value', ['tProduct' => 'id']);
    }

    public function getOptionValues() {
        return $this->hasMany(OptionValue::className(), ['id' => 'tValue'])
      ->viaTable('product_option_value', ['tProduct' => 'id']);
    }

    public function saveOptions($post){
        $productOptions = $post['ProductOption'];
        $ids = $productOptions['id'];
        $values = $productOptions['values'];

        if (!empty($ids)) {
            foreach ($ids as $id) {
                if (empty($id))
                    continue;
                $productoptionModel = new ProductOptionValue();
                $productoptionModel->tProduct = $this->id;
                $productoptionModel->tOption = $id;
                $productoptionModel->tValue = $values[$id];
                $productoptionModel->save();
            }
        }
        return true;
    }
}
