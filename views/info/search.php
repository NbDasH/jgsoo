<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info_index">
	<div style="border:#aaa 1px solid; padding:10px;">
    	类别：
		<?php
        	foreach($info_c as $i){
				echo '<a href="'.Url::current(['category_id' => $i->category->id]).'">'.$i->category->name.'</a> &nbsp; ';
			}
		?>
        <br />
        价格区间：<br />
        新旧：<br />
        搜索：<br />
    </div>
    <div style="border-top:red 3px solid; padding:10px; margin-top:30px;">
    <div>
    	<label><input type="checkbox" onClick="window.location='<?= Url::current(['image_only'=>!isset(Yii::$app->request->get()['image_only']) ? 1 : NULL]) ?>'" <?= !isset(Yii::$app->request->get()['image_only']) ? '' : 'checked="checked"' ?> />只看有图</label>
        <label><input type="checkbox" onClick="window.location='<?= Url::current(['h24_only'=>!isset(Yii::$app->request->get()['h24_only']) ? 1 : NULL]) ?>'" <?= !isset(Yii::$app->request->get()['h24_only']) ? '' : 'checked="checked"' ?> />只看24小时内发布的信息</label>
		<?= Html::a('默认排序',Url::current(['order'=>NULL])); ?>
		<?= isset(Yii::$app->request->get()['order']) && Yii::$app->request->get()['order'] == 'time_desc' ? Html::a('按时间↑',Url::current(['order'=>'time_asc'])) : Html::a('按时间↓',Url::current(['order'=>'time_desc'])) ?>
		<?= isset(Yii::$app->request->get()['order']) && Yii::$app->request->get()['order'] == 'price_desc' ? Html::a('按价格↑',Url::current(['order'=>'price_asc'])) : Html::a('按价格↓',Url::current(['order'=>'price_desc'])) ?>
    </div>
	<?php foreach($data as $v){ ?>
        <?= Html::img($v->first_image(true), ['alt' => '']) ?>
        标题：<?= $v->title ?> &nbsp; &nbsp;
        价格：<?= $v->price ?> &nbsp; &nbsp;
        发布时间：<?= date("Y-m-d H:i",$v->time).'<br /><br />'; ?>
	<?php } ?>
    </div>
    <?php echo LinkPager::widget([
        'pagination' => $pages,
	]); ?>
</div>
