<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */

Yii::$app->view->registerCssFile('/css/form.css');

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

    <?php $model->type = 1; ?>
    <?php $form = ActiveForm::begin([
        'fieldConfig' => ['template' => "<div class='list_form_top'>".
                                            "<div class='list_form_label'>{label}</div>".
                                            "<div class='list_form_input'>{input}{hint}</div>".
                                            "<div class='list_form_error'>{error}</div>".
                                            "<div class='clear'></div>".
                                        "</div>"],
    ]); ?>
    <?= $form->field($model, 'type')->radioList(['1'=>'出售','2'=>'求购']) ?>
    <?php ActiveForm::end(); ?>


    <div class="info-form-1">
        <?php $form = ActiveForm::begin([
            'fieldConfig' => ['template' => "<div class='list_form_top'>".
                                                "<div class='list_form_label'>{label}</div>".
                                                "<div class='list_form_input'>{input}{hint}</div>".
                                                "<div class='list_form_error'>{error}</div>".
                                                "<div class='clear'></div>".
                                            "</div>"],
        ]); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true,'class'=>'form-control list_form_title'])->label('<span>*</span> 标题'); ?>

        <?= $form->field($model, 'identity')->radioList(['个人'=>'个人','中介'=>'中介'])->label('<span>*</span> 身份');  ?>

        <?= $form->field($model, 'addr')->textarea(['rows' => 3])->label('<span>*</span> 详细地址');  ?>

        <?= $form->field($model, 'house_type')->dropDownList([''=>'','1室0厅1卫'=>'1室0厅1卫','1室1厅1卫'=>'1室1厅1卫','2室1厅1卫'=>'2室1厅1卫','2室2厅1卫'=>'2室2厅1卫','2室2厅2卫'=>'2室2厅2卫','3室1厅1卫'=>'3室1厅1卫','3室2厅1卫'=>'3室2厅1卫','3室2厅2卫'=>'3室2厅2卫','4室及以上'=>'4室及以上'])->label('<span>*</span> 房屋户型');  ?>

        <?= $form->field($model, 'area')->textInput()->hint('㎡')->label('<span>*</span> 建筑面积'); ?>

        <?= $form->field($model, 'feature')->dropDownList([''=>'','毛坯房'=>'毛坯房','简单装修'=>'简单装修','中等装修'=>'中等装修','精装修'=>'精装修','豪华装修'=>'豪华装修']) ?>
        
        <?= $form->field($model, 'house_direction')->dropDownList([''=>'','东'=>'东','西'=>'西','南'=>'南','北'=>'北','东西'=>'东西','南北'=>'南北','东南'=>'东南','西北'=>'西北','东北'=>'东北','西南'=>'西南']) ?>

        <?= $form->field($model, 'propert_right')->dropDownList([''=>'','商品房'=>'商品房','商住两用'=>'商住两用','经济适用房'=>'经济适用房','使用权'=>'使用权','公房'=>'公房'])->label('<span>*</span> 产权'); ?>

        <?= $form->field($model, 'propert_right_time')->dropDownList([''=>'','70年产权'=>'70年产权','50年产权'=>'50年产权','40年产权'=>'40年产权']); ?>

        <?= $form->field($model, 'all_floor')->textInput()->hint('层'); ?>

        <?= $form->field($model, 'floor')->textInput()->hint('层'); ?>

        <?= $form->field($model, 'price')->textInput()->hint('万')->label('<span>*</span> 总价');  ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('<span>*</span> 联系人');  ?>

        <?= $form->field($model, 'phone')->textInput()->label('<span>*</span> 联系电话');  ?>

        <?= $form->field($model, 'wechat')->textInput(['maxlength' => true]) ?>

        
        <iframe id="iframe_<?php $model->type; ?>" class="upload_iframe" frameborder="0" scrolling="no" seamless src="<?= Url::to(['info/upload_iframe','type'=>$model->type]); ?>"></iframe>
        <div id="iframe_show_<?= $model->type; ?>">
        </div>
        
        
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

    </div>

    <div class="info-form-2" style="display:none">

        <?php $form = ActiveForm::begin([
            'fieldConfig' => ['template' => "<div class='list_form_top'>".
                                                "<div class='list_form_label'>{label}</div>".
                                                "<div class='list_form_input'>{input}{hint}</div>".
                                                "<div class='list_form_error'>{error}</div>".
                                                "<div class='clear'></div>".
                                            "</div>"],
        ]); ?>

        <?php $model->type = 2; ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true,'class'=>'form-control list_form_title'])->label('<span>*</span> 标题'); ; ?>

        <?= $form->field($model, 'identity')->radioList(['个人'=>'个人','中介'=>'中介'])->label('<span>*</span> 身份'); ?>

        <?= $form->field($model, 'addr')->textarea(['rows' => 3])->label('<span>*</span> 期望居住地');  ?>

        <?= $form->field($model, 'house_type')->dropDownList([''=>'','1室0厅1卫'=>'1室0厅1卫','1室1厅1卫'=>'1室1厅1卫','2室1厅1卫'=>'2室1厅1卫','2室2厅1卫'=>'2室2厅1卫','2室2厅2卫'=>'2室2厅2卫','3室1厅1卫'=>'3室1厅1卫','3室2厅1卫'=>'3室2厅1卫','3室2厅2卫'=>'3室2厅2卫','4室及以上'=>'4室及以上'])->label('<span>*</span> 期望户型');  ?>

        <?= $form->field($model, 'area')->textInput()->hint('㎡')->label('<span>*</span> 期望面积'); ?>

        <?= $form->field($model, 'propert_right')->dropDownList([''=>'','商品房'=>'商品房','商住两用'=>'商住两用','经济适用房'=>'经济适用房','使用权'=>'使用权','公房'=>'公房'])->label('<span>*</span> 期望产权');  ?>

        <?= $form->field($model, 'price')->textInput()->hint('万')->label('<span>*</span> 期望价格');  ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('<span>*</span> 联系人');  ?>

        <?= $form->field($model, 'phone')->textInput()->label('<span>*</span> 联系电话');  ?>

        <?= $form->field($model, 'wechat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

         <h3 class="list_form_h3">补充信息</h3>
        <hr />

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

        <?= $form->field($model, 'type')->hiddenInput()->label(''); ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php Yii::$app->view->registerJs('
    $(document).ready(function(){

        $("input[name=\"Info[type]\"]").click(function(){
            id = $(this).val();
            $(".info-form-1,.info-form-2").hide();
            $(".info-form-"+id).show();
        });
        
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

