<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <?php foreach($categories as $v){ if($v->id != 141){ ?>
        <div>
            <p>
                <?= Html::a($v->name, ['category_second_list','id'=>$v->id], ['class' => 'btn']); ?>
            </p>
            <p>
                <?php foreach($v->categories as $v2){ ?>
                    <?= Html::a($v2->name, ['create','id'=>$v2->id], ['class' => 'btn']); ?>
                <?php } ?>
            </p>
        </div>
    <?php }} ?>
    

</div>
