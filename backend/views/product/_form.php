<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use  backend\models\ProductCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="product-form">
    <div class="form-result"></div>
    <?php
        $form = ActiveForm::begin(['options' => [
            'class' => 'ess-form',
            'data-container' => '#product-list'
        ]]);
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tCategory')->dropDownList(ProductCategory::getCategoryList(), ['prompt' => 'Выбрать тест...']);?>
    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'weight')->textInput() ?>
    <?= $form->field($model, 'color')->textInput() ?>
    <?= $form->field($model, 'count')->textInput() ?>
    <?= $form->field($model, 'price')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => ($model->isNewRecord ? 'btn btn-success save-ess' : 'btn btn-primary update-ess')]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>