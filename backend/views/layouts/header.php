<?php
use yii\helpers\Html;
use yii\bootstrap\Dropdown;
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"></span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <span class="hidden-xs"><?=Yii::$app->user->identity->username?></span>
                    <b class="caret"></b></a>
                        <?php
                            echo Dropdown::widget([
                                'id'=> "profile_dropdown",
                                'items' => [
                                    ['label' => 'Профиль', 'url' => '/'],
                                    ['label' => 'Выход', 'url' => '/admin/logout', 'linkOptions' =>
                                        [
                                            'data-method' => 'post'
                                        ]
                                    ],
                                ],
                            ]);
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
