<?php

/* @var $this yii\web\View */
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '井冈搜-打造井冈山最专业的信息网站';
?>


<div class='index_main'>
    <div class="first_left">
        <div class='index_ad1 banner'>
            <div class='inner_banner'>
                <img src="<?= Url::base(); ?>/images/banner1.jpg" width='900' />
                <img src="<?= Url::base(); ?>/images/banner2.jpg" width='900' />
                <img src="<?= Url::base(); ?>/images/banner3.jpg" width='900' />
            </div>
            <div class="point"></div>
        </div>
    <?php $parents = Category::find()->where(['parent_id'=>1])->orderby('order_nm desc')->all(); ?>
    <?php
        $i=0;
        foreach($parents as $v){
            $i++;

            if($i==1){
                $data = 'float:left;height:250px;';
                $data2 = 295;
            }else if($i+2 == count($parents)){
                $data = 'float:right;height:250px;';
                $data2 = 295;
            }else{
                $data = 'float:left;height:120px;';
                $data2 = 140;
            }
    ?>
    <div class="first_left_img" style="<?= $data; ?>">
        <a href="<?= Url::toRoute(['view', 'id' => $v->id]); ?>">
            <img src="<?= Url::base(); ?>/images/second_img/<?= $v->id ?>.jpg" alt="" />
            <span class='first_left_img_bg' style="height:<?= $data2; ?>px;">
                <?= $v->name ?>
                <p>
                    <?php foreach($v->categories as $v2){ ?>
                        <span data-href="#"><?= $v2->name ?></span>
                    <?php } ?>
                <p>
            </span>
        </a>
        <span class="first_left_img_hover" style="height:<?= $data2; ?>px">
            <?php foreach($v->categories as $v2){ ?>
                <a href="#"><?= $v2->name ?></a>
            <?php } ?>
        </span>
    </div>
    <?php } ?>
    </div>
    <div class="first_right">
        <div class="login_area">
            <div class="user_inf">
                <img class="user_img" src="<?= Url::base(); ?>/images/user_default.jpg" alt="" />
                <p>Hi!你好 <?= Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->name ?></p>
                <p>欢迎来到井冈搜</p>
                <?= Yii::$app->user->isGuest ? Html::a('<img src="'.Url::base().'/images/login_btn_bg.png" alt="" height="20" width="20" style="margin:-4px 10px 0 -15px;" />用户登录', ['site/login'],['class'=>'login_btn']) : ''; ?>
                <?= !Yii::$app->user->isGuest ? Html::a('<img src="'.Url::base().'/images/login_btn_bg.png" alt="" height="20" width="20" style="margin:-4px 10px 0 -15px;" />注销', ['site/logout'],['class'=>'login_btn']) : ''; ?>
                <div class="clear"></div>
            </div>
            
            <?= Yii::$app->user->isGuest ? Html::a('没有账号？点击注册', ['user/create'],['class'=>'reg_btn']) : ''; ?>
            <div class="clear"></div>

        </div>
        <img src="<?= Url::base(); ?>/images/22.jpg" alt="" style="margin-top:15px;"/>
        <img src="<?= Url::base(); ?>/images/11.jpg" alt="" style="margin-top:15px;"/>
        <img src="<?= Url::base(); ?>/images/44.jpg" alt="" />
    </div>
    <!--<div class="first_right" style="width:210px; float:right; margin-top:10px;">
        <img src="<?= Url::base(); ?>/images/bianmin.gif" alt="" width="210px;" height="250px" />
    </div>-->
</div>

<!--
<div class='index_main'>
    <?php $parents = Category::find()->where(['parent_id'=>1])->all(); ?>
    <div class='index_left'>
        <?php foreach($parents as $v){ ?>
                <?= Html::a($v->name, ['view']) ?>
        <?php } ?>
    </div>
    <div class='index_right'>
        <?php foreach($parents as $v){ ?>
                <?php foreach($v->categories as $v2){ ?>
                    <?= Html::a($v2->name, ['view']) ?>
                <?php } ?>
                <div class="clear"></div>
        <?php } ?>
    </div>
    
    <div class="right_ad">
        <img src="<?= Url::base() ?>/images/right_ad.jpg" width="200" height="400"/>
    </div>
    <div class='clear'></div>
</div>
-->

<!--
<embed src="http://imga.tiboo.cn/a/2015/1712231_0821080010.swf" width="1200" height="70" />
<embed src="http://imga.tiboo.cn/a/2015/2023247_0818113329.swf" width="1200" height="70" />
-->
<img src="<?= Url::base(); ?>/images/ad.jpg" width='1200' height='200' />

<div class='index_main'>
    <?php $parents = Category::find()->where(['parent_id'=>2])->orderBy('order_nm desc')->all(); ?>
    <div class="second_top">
        <?= Html::a("<img src='".Url::base()."/images/second_img/".$parents[0]->id.".jpg' width='234' height='100' />", ['view','id' => $parents[0]->id ]) ?>
        <div class="second_link second_link_imp">
            <?php foreach($parents[0]->categories as $v2){ ?>
                <?= Html::a($v2->name, ['view']) ?>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>

    <div class="second_top" style="margin-right:10px;">
        <?= Html::a("<img src='".Url::base()."/images/second_img/".$parents[1]->id.".jpg' width='234' height='100' />", ['view','id' => $parents[1]->id ]) ?>
        <div class="second_link second_link_imp">
            <?php foreach($parents[1]->categories as $v2){ ?>
                <?= Html::a($v2->name, ['view']) ?>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>

    <?php for($i=2;$i<=7;$i++){ ?>
        <div class="second_list">
            <?= Html::a("<img src='".Url::base()."/images/second_img/".$parents[$i]->id.".jpg' width='234' height='100' />", ['view','id' => $parents[$i]->id ]) ?>
            <div class="second_link">
            <?php foreach($parents[$i]->categories as $v2){ ?>
                <?= Html::a($v2->name, ['view']) ?>
            <?php } ?>
            <div class="clear"></div>
        </div>
        </div>
    <?php } ?>

    <div class="clear"></div>

    <div class="second_list_end">
        <div class="second_list_left">
            <?= Html::a("<img src='".Url::base()."/images/second_img/".$parents[8]->id.".png' width='50' height='50' />".$parents[8]->name, ['view','id' => $parents[8]->id ],['class'=>'second_list_end_title']) ?>
            <?php foreach($parents[8]->categories as $v2){ ?>
                <?= Html::a($v2->name, ['view']) ?>
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class='clear'></div>
</div>

<!--<div class='index_ad2'>
    <img src="<?= Url::base(); ?>/images/ad2.jpg" width='1200' height='70' />
</div>-->

 <?php Yii::$app->view->registerJs('
    $("document").ready(function(){
        var act = 1;
        var timer;
        var img_nm = $(".inner_banner img").length;

        $(".inner_banner").css("width",900*img_nm+"px");

        var data = "";
        for(i=1;i<=img_nm;i++){
            data += "<span data-id=\""+i+"\"></span>";
        }
        $(".point").html(data);
        $(".point span:eq(0)").css("background","orange");
        $(".point").css("margin-left",-5.5*img_nm+"px");

        function move(action){
            if(!action){
                act++;
            }else{
                act = action;
            }

            if(act > img_nm){
                act = 1;
            }

            $(".inner_banner").animate({"margin-left":-900*(act-1)+"px"},"fast");
            $(".point span").css("background","#b7b7b7");
            $(".point span:eq("+(act-1)+")").css("background","orange");
        }
        
        timer = setInterval(function(){move();},5000);

        $(".point span").click(function(){
            clearInterval(timer);
            move($(this).attr("data-id"));
            timer = setInterval(function(){move();},5000);
        });

    });
 ') ?>
