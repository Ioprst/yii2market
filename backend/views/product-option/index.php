<?php
use yii\helpers\Html;

$this->title = 'Опции товаров';

$columns =  [
    'id',
    'name:text',
    'description:html',
    'dCreate:datetime',
    'dUpdate:datetime',
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
                'data-container' => '#option-list',
                'data-url' => $url,
                'title' => Yii::t('yii', 'Delete'),
                ]);
            },
        ],
    ],
];

$options = [
    'title' => 'Создать опцию',
    'columns' => $columns,
    'essence' =>'product-option',
    'container' => 'option-list'
];

echo $this->render('../layouts/list',
   [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'options' => $options
    ]
);