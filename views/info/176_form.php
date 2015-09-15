<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */

Yii::$app->view->registerCssFile('/css/form.css');
Yii::$app->view->registerJsFile('/js/upload_img.js');

?>

<?= $this->render('_road', ['model' => $model,'view' => $view,'id' => $id,]) ?>

<div class="list_form_background">
    <img src="<?= Url::base() ?>/images/list_form_right_bg.png" alt="" class="list_form_right_bg" />
    
    <div class="list_form_info">
        <p>您可以在此页面下填写您的供求信息。</p>
        <p>请选择您所需求的类目进行信息发布，避免错过质量客户；</p>
        <p>尽量完善充实信息内容，可有效提高成交率；</p>
        <p>请勿发布分期付款类、微商推广类、淘宝物品推广类信息。</p>
        <p>发布优质信息，搜索所得结果将靠前！</p>
    </div>

    <h3 class="list_form_h3">基本信息</h3>
    <hr />
	<?php 
		$model->type = 15;
		$form = ActiveForm::begin([
			'fieldConfig' => ['template' => "<div class='list_form_top'>".
												"<div class='list_form_label'>{label}</div>".
												"<div class='list_form_input'>{input}{hint}</div>".
												"<div class='list_form_error'>{error}</div>".
												"<div class='clear'></div>".
											"</div>"],
		]);
	?>
    
    <?= $form->field($model, 'type')->dropDownList([''=>'','1'=>'1']);  ?>
    <?= $form->field($model, 'identity')->dropDownList([''=>'','1'=>'1']);  ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true,'class'=>'form-control list_form_title'])->label('<span>*</span> 标题'); ?>
    
    <?= $form->field($model, 'select1')->dropDownList([''=>'','1'=>'1']);  ?>
    <?= $form->field($model, 'select2')->dropDownList([''=>'','1'=>'1']);  ?>
    <?= $form->field($model, 'select3')->dropDownList([''=>'','1'=>'1']);  ?>
    
    <?= $form->field($model, 'addr')->textarea(['rows' => 3]);  ?>
    
    <?= $form->field($model, 'price')->textInput()->hint('元');  ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]);  ?>
    
    <?= $form->field($model, 'phone')->textInput();  ?>
    
    <?= $form->field($model, 'wechat')->textInput(['maxlength' => true]) ?>
    
    <iframe id="iframe_<?php $model->type; ?>" class="upload_iframe" frameborder="0" scrolling="no" seamless src="<?= Url::to(['info/upload_iframe','type'=>$model->type]); ?>"></iframe>
    <div id="iframe_show_<?= $model->type; ?>" class="iframe_show_photo"></div>
    
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
     <h3 class="list_form_h3">补充信息</h3>
    <hr style="margin-bottom:10px;" />
    
    <?= $form->field($model, 'other1')->textarea(['rows' => 2]) ?>
    
    <div class="other_input_div">
        <?= $form->field($model, 'other2')->textarea(['rows' => 2,'class'=>'other_input form-control']) ?>
    </div>
    
    <div class="other_input_div">
        <?= $form->field($model, 'other3')->textarea(['rows' => 2,'class'=>'other_input form-control']) ?>
    </div>
    
    <?= Html::button('+', ['class'=>'btn other_btn']) ?>
    <hr style="margin:20px 0;" />
    <?= Html::submitButton('确认并发布', ['class' => 'btn list_submit_btn']) ?>
    
    <?= $form->field($model, 'photo')->hiddenInput(['id'=>'info_photo_'.$model->type])->label(''); ?>
    <?= $form->field($model, 'type')->hiddenInput()->label(''); ?>
    
    <?php ActiveForm::end(); ?>
    
    <?php Yii::$app->view->registerJs('
    $(document).ready(function(){
		
		$(".other_input").each(function(){
			if($(this).val() == ""){
				$(this).parent().parent().parent().parent().hide();
			}
		});

		set_other_btn();

		$(".other_btn").click(function(){
			$(this).parent().children(".other_input_div:hidden").eq(0).show();
			set_other_btn()
		});

		function set_other_btn(){
			$(".other_btn").each(function(){
				if($(this).parent().children(".other_input_div:visible").length >= 2){
					$(this).hide();
				}else{
					$(this).show();
				}
			});
		}
	});
	');?>

