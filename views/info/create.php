<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = 'Create Info';
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-create">
	<!--<?= $view; ?>-->
    <?php //exit(); ?>
    <?= $this->render($view.'_form', [
        'model' => $model,
		'view' => $view,
		'id' => $id,
    ]) ?>

</div>
