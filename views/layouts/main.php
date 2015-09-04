<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <link rel="stylesheet" type="text/css" href="<?= Url::base(); ?>/css/home.css" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!--
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->name . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>
-->

    <div class="index_head">
        <?= Html::a('<img class="logo" src="'.Url::base().'/images/logo.png" width="100px" />', ['site/index']) ?>
        <div class="search_div">
            <form>
                <input type="text" name="search" class="search_input" value="找房子找工作找装修" />
                <input type="button" value="搜 索" class="search_btn" />
            </form>
        </div>
        <div class="top_add_div">
            <?= Html::a('免费发布信息', ['info/category_list'],['class'=>'top_add_btn']) ?>
            <?= Html::a('修改／删除信息', ['site/index']) ?>
        </div>
    </div>

    <div class="index_nav">
        <div class="index_inner_nav">
            <?= Html::a('首1111页', ['site/index']) ?>
            <?= Html::a('招聘求职', ['site/index']) ?>
            <?= Html::a('租房', ['site/index']) ?>
            <?= Html::a('二手房', ['site/index']) ?>
            <?= Html::a('二手车', ['site/index']) ?>
            <?= Html::a('新房', ['site/index']) ?>
            <?= Html::a('跳蚤市场', ['site/index']) ?>
            <?= Html::a('宠物', ['site/index']) ?>
        </div>
    </div>
    <div style="background:white; padding:20px 0 20px 0;">
        <div style="width:1200px;margin:0 auto;">
            <?= $content ?>
        </div>
    </div>
</div>

<div class="foot">
    <div class="inner_footer">
        <div>©2015 jgsoo.com, All Rights Reserved.　　本站发布的所有内容，未经许可，不得转载，详见《知识产权声明》、《用户使用协议》</div>
        <div>增值电信业务经营许可证：赣B2-20040012　　互联网地图服务资质：乙测资字31202063 Email:dash@jgsoo.com jgsyu@jgsoo.com</div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
