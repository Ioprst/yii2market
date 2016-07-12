<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="dataTables_wrapper dt-bootstrap">
                    <div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div>
                    <div class="row">
                       <div class="col-sm-12">
                            <p>
                                <?php
                                    //create modal form
                                    if (isset($options['title'])) {
                                        Modal::begin([
                                            "id" => "new-ess",
                                            'header' => '<h4 class="modal-title">'.$options['title'].'</h4>',
                                            'toggleButton' => [
                                                'label' => $options['title'],
                                                'data-target'=>'#new-ess',
                                                'href' => Url::to([$options['essence'].'/create']),
                                                'class' => 'btn btn-success'
                                            ],
                                            'clientOptions' => false,
                                        ]);
                                        Modal::end();
                                    }

                                    //update modal form
                                    Modal::begin([
                                        "id" => "update-ess",
                                        'clientOptions' => false,
                                    ]);
                                    Modal::end();
                                ?>
                            </p>

                            <? //echo $this->render('_search', ['model' => $searchModel]); ?>

                            <?php \yii\widgets\Pjax::begin([
                                //'clientOptions' => ['method' => 'POST'],
                                'id'=> $options['container']
                            ]); ?>

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'tableOptions' => [
                                   'class' => 'table table-bordered table-hover dataTable'
                                ],
                                'layout'=>"{items}\n{summary}\n{pager}",
                                'summary' => "Отображается {begin} - {end} из {totalCount} записей",
                                'rowOptions'=>function ($model, $key, $index, $grid) {
                                    $class = $index % 2 ? 'odd' : 'even';
                                    return [
                                        'class' => $class
                                    ];
                                },
                                'columns' => $options['columns']
                            ]); ?>
                            <?php \yii\widgets\Pjax::end(); ?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
