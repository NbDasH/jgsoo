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
    <span id="err_span" style=" height:34px; line-height:34px; color:#a94442; display:inline-block; padding-left:20px;"><?= yii::$app->session->getFlash('upload_err'); ?></span>
    <input name="photo" type="file" id="photo_input" style=" visibility:hidden;" accept=".jpg,.png,.gif" />
    <?php ActiveForm::end(); ?>
    <?php Yii::$app->view->registerJs('
		$(document).ready(function(){
			$("#upload_btn").click(function(){
				$("#photo_input").click();
			});
			$("#photo_input").change(function(){
				$("#upload_form").submit();
				$("#err_span").html("正在上传，请稍侯...");
				$("#upload_btn").hide();
			});
		});
	'); ?>
    
    <?php 
	if(isset($type) & isset($file_name)){
		Yii::$app->view->registerJs('
			$(document).ready(function(){
				$("#iframe_show_'.$type.'", window.parent.document).prepend("<div style=\"display:inline-block;position:relative;\"><span class=\"info_delimg_btn\"></span><img src=\"'.Url::base().'/info_upload/temp/'.$file_name.'_min.jpg\" alt=\"'.$file_name.'\" /></div>");
				var data = "";
				$("#iframe_show_'.$type.' img", window.parent.document).each(function(){
					data += $(this).attr("alt")+";";
				});
				$("#info_photo_'.$type.'", window.parent.document).val(data.substr(0,data.length-1));
			});
		');
	}
	?>
	
	
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>