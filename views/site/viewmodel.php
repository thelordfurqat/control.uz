<?php
/**
 *
 * Created by PhpStorm.
 * User: Lord
 * Date: 16.04.2019
 * Time: 21:10
 */

$this->title = 'Qurilmalar';
$this->params['breadcrumbs'][] = $this->title;
?><div class="row">
<div class="col-lg-6">
    <h3 class="product-title" style="text-align: left">Barcha qurilmalar </h3>
</div>
    <div class="col-lg-6 " style="float: right; ">
    <a href="<?=Yii::$app->urlManager->createUrl(['site/createmodel'])?>" style="float: right;"><button class="btn btn-success">Yangi model qo'shish</button> </a>
    </div>
</div>
<section class="section-products">
    <? foreach ($model as $item) {?>
        <div class="products">
            <div class="product-img-box">
                <img class="product-img" src="<?=Yii::$app->homeUrl?>image/<?=$item->image?>">
                <div class="product-overlay">
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/productdetails','id'=>$item->id])?>"><div class="product-btn">Ma'lumot</div></a>
                </div>
            </div>
            <p class="product-name"><?=$item->name?></p>
        </div>
    <?}?>


</section>