<?php
use yii\helpers\Html;

$this->title = 'Журнал заказов';

$columns =  [
    'id',
    [
        'attribute' => 'tProduct',
        'label' => 'Товар',
        'value' => function($data){
            return $data['product']['name'];
        },
    ],
    'description:text',
    'count:text',
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
                'data-container' => '#order-list',
                'data-url' => $url,
                'title' => Yii::t('yii', 'Delete'),
                ]);
            },
        ],
    ],
];

$options = [
    'columns' => $columns,
    'essence' =>'order',
    'container' => 'order-list'
];

echo $this->render('../layouts/list',
   [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'options' => $options
    ]
);