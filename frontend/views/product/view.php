<?
    use backend\models\ProductOptionValue;
    $productOptionValues = ProductOptionValue::getOptionsValues($model->id);
?>
<div class="main-container">
    <div class="container">
        <ol class="breadcrumb pull-left">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="/catalog">Каталог</a></li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 page-content col-thin-right">
                <div class="inner inner-box ads-details-wrapper">
                    <h2><?=$model->name?></h2>
                    <span class="info-row">
                        <span class="category"><?=$model->category->name?></span>
                    </span>
                    <div class="ads-image">
                        <img src="<?=$model->photo?>" alt="">
                        <h1 class="pricetag"><?=$model->price?>р.</h1>
                        <div style="margin-top:20px;" class="Ads-Details">
                            <p><?=$model->description?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3  page-sidebar-right">
                <aside>
                    <div class="panel sidebar-panel panel-contact-seller">
                        <div class="panel-heading">Опции</div>
                        <div class="panel-content user-info">
                            <div class="panel-body text-center">
                                <div class="product-info">
                                    <p>Вес: <strong><?=$model->weight?> гр.</strong></p>
                                    <p>Цвет : <strong><?=$model->color?></strong></p
                                    <p>Количество : <strong><?=$model->count?></strong></p>
                                    <p>Цена : <strong><?=$model->price?>р.</strong></p>
                                    <?
                                        foreach ($productOptionValues as $productOptionValue) {
                                        ?>
                                            <p><?=$productOptionValue['option']->name?>: <strong><?=$productOptionValue['value']->text?></strong></p>
                                        <?}
                                    ?>
                                </div>
                                <div class="user-ads-action">
                                    <button type="button" data-product="<?=$model->id?>" href="#" class="product-buy btn btn-info btn-block">
                                        <i class=" icon-phone-1"></i> Купить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
