<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="main" class="wrap">
    <div class="header">
        <nav role="navigation" class="navbar navbar-top navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">      <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/">
                                <i class="icon-location-2 icon-append"></i>
                                <i class="icon-down-open-big"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/login">Вход</a></li>
                        <li><a href="/signup">Регистрация</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <nav role="navigation" class="navbar navbar-head">
        <div class="container">
            <div class="row search-top">
                <div class="col-sm-2 reset">
                    <div class="logo-container">
                        <h1 class="logo-link">
                            <a href="/">
                            <span class="site-logo">Super Market</span>
                            <span class="sub-logo">интернет-магазин</span>
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
