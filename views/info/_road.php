<?php

use yii\helpers\Html;
use app\models\Category;

?>

<div class="list_form_road">
    <div class="list_form_road_div">
        <span class="list_form_road_lock">1</span>
        <p>选择类目 (<?= Category::findOne($view)->name ?> > <?= Category::findOne($id)->name ?> <?= HTML::a('重选',['info/category_list']); ?> )</p>
    </div>
    <div class="list_form_road_gt"></div>
    <div class="list_form_road_div">
        <span class="list_form_road_lock">2</span>
        <p>填写信息</p>
    </div>
    <div class="list_form_road_gt"></div>
    <div class="list_form_road_div">
        <span>3</span>
        <p>完成发布</p>
    </div>
    <div class="clear"></div>
</div>


