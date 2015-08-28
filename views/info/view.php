<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'price',
            'addr:ntext',
            'name',
            'phone',
            'wechat',
            'content:ntext',
            'photo',
            'identity',
            'type',
            'house_type',
            'house_direction',
            'area',
            'propert_right',
            'propert_right_time',
            'floor',
            'feature:ntext',
            'all_floor',
            'select1',
            'select2',
            'select3',
            'select4',
            'select5',
            'select6',
            'other1:ntext',
            'other2:ntext',
            'other3:ntext',
            'user_id',
            'category_id',
            'time:datetime',
        ],
    ]) ?>

</div>
