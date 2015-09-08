<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_list_road') ?>
<div class="info_title">
		<div class="info_left_title">
			商品交易
		</div>
		<div class="info_right_title">
			本地服务
		</div>
	</div>
<div class="info_index">
	
	<div class="info_left">
		 <?php foreach($categories[0]->categories as $v){ if($v->id != 141){ ?>
			<div>
				<p class="info_left_p">
					<?php foreach($v->categories as $v2){ ?>
						<?= Html::a($v2->name, ['create','id'=>$v2->id], ['class' => 'btn']); ?>
					<?php } ?>
				</p>
				<?= Html::a($v->name, ['category_second_list','id'=>$v->id], ['class' => 'btn']); ?>
			</div>
		<?php }} ?>
	</div>
	<div class="info_right">
		<?php foreach($categories[1]->categories as $v){ if($v->id != 141){ ?>
			<div>
				<p class="info_right_p">
					<?php foreach($v->categories as $v2){ ?>
						<?= Html::a($v2->name, ['create','id'=>$v2->id], ['class' => 'btn']); ?>
					<?php } ?>
				</p>
				<?= Html::a($v->name, ['category_second_list','id'=>$v->id], ['class' => 'btn']); ?>
			</div>
		<?php }} ?>
	</div>
	<div class="clear"></div>
</div>
