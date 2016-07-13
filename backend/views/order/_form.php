<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Order;
?>

<div class="category-form">
    <div class="form-result"></div>
    <?php
        $form = ActiveForm::begin(['options' => [
            'class' => 'ess-form',
            'data-container' => '#order-list'
        ]]);
    ?>
    <?= $form->field($model, 'status')->dropDownList(Order::getStatusMap(),['prompt' => 'Изменить статус...']);?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => ($model->isNewRecord ? 'btn btn-success save-ess' : 'btn btn-primary update-ess')]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
