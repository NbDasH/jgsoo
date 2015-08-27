<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'addr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'wechat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'propert_right_id')->textInput() ?>

    <?= $form->field($model, 'propert_right_time')->textInput() ?>

    <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feature')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'facilities')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'select1')->textInput() ?>

    <?= $form->field($model, 'select2')->textInput() ?>

    <?= $form->field($model, 'select3')->textInput() ?>

    <?= $form->field($model, 'select4')->textInput() ?>

    <?= $form->field($model, 'select5')->textInput() ?>

    <?= $form->field($model, 'select6')->textInput() ?>

    <?= $form->field($model, 'other1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'other2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'other3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
