<div class="item-box col-md-3 col-sm-4 col-xs-6">
    <div class="item-img">
        <a href="/product/view?id=<?=$model->id?>">
            <div class="item-thumb">
                <img alt="img" src="http://amrox.ru/image/206.png">
            </div>
        </a>
    </div>
    <div class="description">
        <a href="/product/view?id=<?=$model->id?>">
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
           <a href="/product/view?id=<?=$model->id?>" class="btn btn-default btn-sm pull-right fav">
            Подробнее
         </a>
    </div>
</div>