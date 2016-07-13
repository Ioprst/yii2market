<?
use yii\helpers\Html;
use yii\widgets\ListView;

?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content-box latest-listings">
                    <h2 class="content-box-title">Католог товаров</h2>
                    <div class="latest-ads">
                        <div class="row">
                            <div class="ads-list col-sm-12">
                            <?php \yii\widgets\Pjax::begin([
                                'id'=> 'product-listings'
                            ]);
                                echo ListView::widget([
                                        'dataProvider' => $dataProvider,
                                        'itemView' => '_product',
                                        'layout' => '<div><span class="pull-right">{summary}</span>{pager}</div>{items}',
                                        'summary' => "Показано {begin} - {end} из {totalCount} товаров",
                                ]) ?>
                            <?php \yii\widgets\Pjax::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>