<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;


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

<div class="index_head">
	<?= Html::a('<img class="logo" src="'.Url::base().'/images/logo.png" width="100px" />', ['site/index']) ?>
	<div class="search_div">
		<?php $form = ActiveForm::begin([
			'action' => '/info/search',
			'method'=>'get',
		]); ?>
			<input type="text" name="keyword" class="search_input" value="找房子找工作找装修" />
			<input type="submit" value="搜 索" class="search_btn" />
		<?php ActiveForm::end(); ?>
	</div>
	<div class="top_add_div">
		<?= Html::a('免费发布信息', ['info/category_list'],['class'=>'top_add_btn']) ?>
		<?= Html::a('修改／删除信息', ['site/index']) ?>
	</div>
</div>

<div class="index_nav">
	<div class="index_inner_nav">
		<?= Html::a('首页', ['site/index']) ?>
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

<?= $this->render('_foot') ?>

<?php Yii::$app->view->registerJs('
    $(document).ready(function(){
		var old_text = $(".search_input").val();
		$(".search_input").focus(function(){
			if($(this).val() == old_text){
				$(this).val("");
				$(this).css("color","#333");
			}
		});
		$(".search_input").blur(function(){
			if($(this).val() == ""){
				$(this).val(old_text);
				$(this).css("color","#aaa");
			}
		});
	});
');?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
