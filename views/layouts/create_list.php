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

    <div class="index_head">
		<div class="top_menu">
			
		</div>
        <!--
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
        -->
    </div>
<!--
    <div class="index_nav">
        <div class="index_inner_nav">
            <?= Html::a('首页', ['site/index']) ?>
            <?= Html::a('头条活动', ['category/index']) ?>
            <?= Html::a('租房', ['view']) ?>
            <?= Html::a('二手车', ['view']) ?>
            <?= Html::a('本地服务', ['view']) ?>
            <?= Html::a('联系我们', ['view']) ?>
        </div>
    </div>
-->
    <div style="background:#eee; padding:20px 0 20px 0;">
            <?= $content ?>
    </div>
</div>

<div class="foot">
    <div class="inner_footer">
		<div>http://route.showapi.com/9-4?showapi_appid=8234&showapi_sign=2058a9b7e9e348b7b2990d756a20c719&showapi_timestamp=<?php echo date('YmdHis') ?>&ip=182.254.220.136</div>
        <div>2015 jgsoo.com, All Rights Reserved.　　本站发布的所有内容，未经许可，不得转载，详见《知识产权声明》、《用户使用协议》</div>
        <div>增值电信业务经营许可证：赣B2-20040012　　互联网地图服务资质：乙测资字31202063</div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
