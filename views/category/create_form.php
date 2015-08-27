<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

<div id="add_div">
    <div class="form-group field-category-parent_id">
		<label class="control-label" >Name</label>
		<input type="text" class="form-control" name="Category[name][]">
	</div>
</div>
	<input type="button" id="add_btn" value="add" class="btn btn-success" /><br /><br />

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php Yii::$app->view->registerJs('
	$(document).ready(function(){
		$("#add_btn").click(function(){
			$("#add_div").append("<div class=\"form-group field-category-parent_id\"><label class=\"control-label\" >Name</label><input type=\"text\" class=\"form-control\" name=\"Category[name][]\"></div>");
		});
	});
'); ?>
