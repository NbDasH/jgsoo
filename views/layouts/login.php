<?php
//$weather = json_decode(file_get_contents("http://route.showapi.com/9-4?showapi_appid=8234&showapi_sign=2058a9b7e9e348b7b2990d756a20c719&showapi_timestamp=".date('YmdHis')."&ip=".Yii::$app->request->userIP));
//.Yii::$app->request->userIP
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
	<link rel="stylesheet" type="text/css" href="<?= Url::base(); ?>/css/category_list.css" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="top_menu_bg">
	<div class="top_menu">
		<div class="weather">
			天气载入中...
		</div>
		<div class="top_login">
		<?= Yii::$app->user->setReturnUrl(Url::current()); ?>
		<?php if(Yii::$app->user->isGuest){ ?>
			您好,请<?= Html::a('[登录]',['site/login'],['class'=>'top_login_btn']); ?> &nbsp; <?= Html::a('免费注册',['user/create'],['class'=>'top_login_btn']); ?>
		<?php }else{ ?>
			您好,<?= Yii::$app->user->Identity->name; ?> 欢迎回来。 <?= Html::a('[注销]',['site/logout'],['class'=>'top_login_btn']); ?>
		<?php } ?>
		</div>
		<div class="top_nav">
			<ul>
				<?php if(!Yii::$app->user->isGuest){ ?>
				<li>
					<?= Html::a('我的井冈搜',['site/index']) ?>
					<ul>
						<li><?= Html::a('我的发布',['site/index']) ?></li>
						<li><?= Html::a('我的交易',['site/index']) ?></li>
						<li><?= Html::a('我的求职',['site/index']) ?></li>
						<li><?= Html::a('我的招聘',['site/index']) ?></li>
						<li><?= Html::a('我的简历',['site/index']) ?></li>
					</ul>
				</li>
				<li><?= Html::a('个人中心',['site/index']) ?></li>
				<?php } ?>
				<li><?= Html::a('商户推广',['site/index']) ?></li>
				<li><?= Html::a('联系我们',['site/index']) ?></li>
				<li><?= Html::a('[收藏本站]',['site/index']) ?></li>
			</ul>
		</div>
	</div>
</div>

<div class="index_head">
</div>

<div style="background:url('../images/login_bg.jpg'); background-size:cover; padding:20px 0 20px 0; min-height:500px; ">
	<?= $content ?>
</div>

<?= $this->render('_foot') ?>

<?php Yii::$app->view->registerJs('
$(document).ready(function(){
	$.getJSON("'.Url::to(['weather/getweather','ip'=>(in_array(Yii::$app->request->userIP,['::1','127.0.0.1','localhost']) ?'219.137.228.66':Yii::$app->request->userIP)]).'",function(data){
		$(".weather").html(
		"<image src=\""+data.showapi_res_body.now.weather_pic+"\" height=\"30\" width=\"30\" /> "+
		data.showapi_res_body.now.aqiDetail.area+" "+
		data.showapi_res_body.now.weather+" 实时温度:"+
		data.showapi_res_body.now.temperature+"℃"
		);
		console.log(data);
	});
});
');?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
