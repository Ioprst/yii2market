<?php
use yii\widgets\Breadcrumbs;
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= \yii\helpers\Html::encode($this->title); ?></h1>
        <?
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>
    <section class="content">
        <?= $content ?>
    </section>
</div>