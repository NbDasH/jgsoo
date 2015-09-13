<?php

use yii\helpers\Html;
use yii\helpers\Url;
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
	<link rel="stylesheet" type="text/css" href="<?= Url::base(); ?>/css/category_list.css" />
</head>
<body>
<?php $this->beginBody() ?>


	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id'=>'upload_form']]) ?>
    <?= Html::Button('点击上传图片', ['class' => 'btn','style'=>'background:red; color:#fff;','id'=>'upload_btn']) ?>
    <span style=" height:34px; line-height:34px; color:#a94442; display:inline-block; padding-left:20px;"><?= yii::$app->session->getFlash('upload_err'); ?></span>
    <input name="photo" type="file" id="photo_input" style=" visibility:hidden;" />
    <?php ActiveForm::end(); ?>
    <?php Yii::$app->view->registerJs('
		$(document).ready(function(){
			$("#upload_btn").click(function(){
				$("#photo_input").click();
			});
			$("#photo_input").change(function(){
				$("#upload_form").submit();
			});
		});
	'); ?>
    
    <?php Yii::$app->view->registerJs('
		$(document).ready(function(){
		});
	'); ?>
	
	
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>