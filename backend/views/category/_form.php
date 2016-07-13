<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="category-form">
    <div class="form-result"></div>
    <?php
        $form = ActiveForm::begin(['options' => [
            'class' => 'ess-form',
            'data-container' => '#cat-list'
        ]]);
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => ($model->isNewRecord ? 'btn btn-success save-ess' : 'btn btn-primary update-ess')]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
