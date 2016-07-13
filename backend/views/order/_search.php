<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tProduct') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'dCreate') ?>

    <?php // echo $form->field($model, 'dUpdate') ?>

    <?php // echo $form->field($model, 'tUserCreate') ?>

    <?php // echo $form->field($model, 'tUserUpdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
