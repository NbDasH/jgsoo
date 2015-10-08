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
    <div>只看有图 只看今天发布的信息 
		<?= isset(Yii::$app->request->get()['time_desc']) && Yii::$app->request->get()['time_desc'] == 1 ? Html::a('按时间↑',Url::current(['time_desc'=>0])) : Html::a('按时间↓',Url::current(['time_desc'=>1])) ?>
		<?= isset(Yii::$app->request->get()['price_desc']) && Yii::$app->request->get()['price_desc'] == 1 ? Html::a('按价格↑',Url::current(['price_desc'=>0])) : Html::a('按价格↓',Url::current(['price_desc'=>1])) ?>
    </div>
	<?php foreach($data as $v){ ?>
		<?= $v->title.'<br />'; ?>
	<?php } ?>
    </div>
    <?php echo LinkPager::widget([
        'pagination' => $pages,
	]); ?>
</div>
