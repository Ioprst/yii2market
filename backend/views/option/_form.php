<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="option-form">
    <div class="form-result"></div>
    <?php
        $form = ActiveForm::begin(['options' => [
            'class' => 'ess-form',
            'data-container' => '#option-list'
        ]]);
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?php
            echo $this->render('//option-value/list', ['model'=> $model]);
        ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => ($model->isNewRecord ? 'btn btn-success save-ess' : 'btn btn-primary update-ess')]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?
    $this->registerJsFile(Yii::getAlias('@web').'/js/ProductOption.js');
?>
