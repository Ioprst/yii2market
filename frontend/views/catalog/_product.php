<div class="item-box col-md-3 col-sm-4 col-xs-6">
    <div class="item-img">
        <a data-pjax="0" href="/product/view?id=<?=$model->id?>">
            <div style="background:url('<?=$model->photo?>')"class="item-thumb">
            </div>
        </a>
    </div>
    <div class="description">
        <a data-pjax="0" href="/product/view?id=<?=$model->id?>">
            <h4 class="item-title"><?=$model->name?></h4>
        </a>
        <div class="dop">
            <div>
                Осталось <span class="product-counter"><?=$model->count?></span> штук
            </div>
        </div>
    </div>
    <div class="price">
        <h3 class="item-price pull-left"><?=$model->price?> р.</h3>
           <a data-pjax="0" href="/product/view?id=<?=$model->id?>" class="btn btn-default btn-sm pull-right fav">
            Подробнее
         </a>
    </div>
</div>