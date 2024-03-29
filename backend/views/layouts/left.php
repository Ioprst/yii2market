<aside class="main-sidebar">
    <section class="sidebar">
        <?php
            $items = [
                ['label' => '', 'options' => ['class' => 'header']],
                ['label' => '<i class="fa fa-users"></i> <span>Журнал заказов</span>','icon' => 'fa fa-users', 'url' => ['/order/index']],
                ['label' => '<i class="fa fa-users"></i> <span>Категории товара</span>','icon' => 'fa fa-users', 'url' => ['/category/index']],
                ['label' => '<i class="fa fa-users"></i> <span>Товар</span>','icon' => 'fa fa-users', 'url' => ['/product/index']],
                ['label' => '<i class="fa fa-users"></i> <span>Опции товара</span>','icon' => 'fa fa-users', 'url' => ['option/index']],
            ];
        ?>
        <?= \yii\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $items,
                'encodeLabels' => false,
            ]
        ) ?>
    </section>
</aside>
