<?php
use yii\helpers\Html;

$this->title = 'Товары';

$columns =  [
    'id',
    'name:text',
    'count:text',
    [
        'attribute' => 'tCategory',
        'label' => 'Категория',
        'value' => function($data){
            return $data['category']['name'];
        },
    ],
    'price:text',
    [
        'attribute' => 'tUserCreate',
        'label' => 'Создал',
        'value' => function($data){
            return $data['userCreate']['username'];
        },
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update} {delete}',
        'header'=>'Действия',
        'buttons'=>[
            'update' => function ($url, $model, $key) {
                return '<a data-toggle="modal" href="'.$url.'" title="'.Yii::t('yii', 'Update').'"class="btn btn-primary btn-sm"  data-target="#update-ess"> <span class="glyphicon glyphicon-edit"></span> </a>';
            },
            'delete' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                'class'=>"btn btn-danger btn-sm remove-ess",
                'data-model' => $model->id,
                'data-container' => '#product-list',
                'data-url' => $url,
                'title' => Yii::t('yii', 'Delete'),
                ]);
            },
        ],
    ],
];

$options = [
    'title' => 'Создать товар',
    'columns' => $columns,
    'essence' =>'product',
    'container' => 'product-list'
];

echo $this->render('../layouts/list',
   [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'options' => $options
    ]
);