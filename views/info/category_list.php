<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info_index">
	<div class="info_left">
		 <?php foreach($categories[0]->categories as $v){ if($v->id != 141){ ?>
			<div>
				<?= Html::a($v->name, ['category_second_list','id'=>$v->id], ['class' => 'btn']); ?>
				<p class="info_left_p">
					<?php foreach($v->categories as $v2){ ?>
						<?= Html::a($v2->name, ['create','id'=>$v2->id], ['class' => 'btn']); ?>
					<?php } ?>
				</p>
			</div>
		<?php }} ?>
	</div>
	<div class="info_right">
		<?php foreach($categories[1]->categories as $v){ if($v->id != 141){ ?>
			<div>
				<?= Html::a($v->name, ['category_second_list','id'=>$v->id], ['class' => 'btn']); ?>
				<p class="info_right_p">
					<?php foreach($v->categories as $v2){ ?>
						<?= Html::a($v2->name, ['create','id'=>$v2->id], ['class' => 'btn']); ?>
					<?php } ?>
				</p>
			</div>
		<?php }} ?>
	</div>
	<div class="clear"></div>
</div>
