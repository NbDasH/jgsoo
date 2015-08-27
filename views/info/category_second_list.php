<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <?php foreach($categories as $v){ ?>
        <div>
            <p>
                <?= Html::a($v->name, ['create','id'=>$v->id], ['class' => 'btn']); ?>
            </p>
        </div>
    <?php } ?>

</div>
