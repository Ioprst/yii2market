<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Редактирование заказа';
?>

<div class="modal-header">
    <button aria-label="Close" data-dismiss="modal" class="close" type="button">
    <span aria-hidden="true">×</span></button>
    <h4 class="modal-title"><?= Html::encode($this->title) ?></h4>
</div>
<div class="modal-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
