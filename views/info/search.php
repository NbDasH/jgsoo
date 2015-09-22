<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info_index">
	<div>
    	类别：<?php foreach($info_c as $i){echo $i->category->name.' &nbsp; ';} ?><br />
        价格区间：<br />
        新旧：<br />
        搜索：<br />
    </div>
	<?php foreach($data as $v){echo $v->title.'<br />';} ?>
    
    <?php echo LinkPager::widget([
        'pagination' => $pages,
	]); ?>
</div>

<div class="info_other" style=" width:500px; text-align:center; margin:20px auto 0; background:#e0e0e0; padding:10px; border-radius:5px;">
	找不到合适的类目？觉得类目设置不合理？ <a href="#" style="color:#F5400D;">点此反馈告诉我们</a>
</div>
