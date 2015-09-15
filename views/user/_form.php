<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

Yii::$app->view->registerCssFile('/css/form.css');

?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
    'fieldConfig' => ['template' => "<div class='list_form_top'>".
                                        "<div class='list_form_label'>{label}</div>".
                                        "<div class='list_form_input'>{input}{hint}</div>".
                                        "<div class='list_form_error'>{error}</div>".
                                        "<div class='clear'></div>".
                                    "</div>"],
	]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
