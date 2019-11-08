<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Xonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="room-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
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
            'name',
            'more:ntext',
        ],
    ]) ?>

</div>
<br>
<br>
<br>
<?php ActiveForm::begin(['action'=>'jihoz'])?>
<section class="section-users" style="height: 100%">
    <table style="margin-top: -40px;">
        <tr>
            <td colspan="1">Soni: <?=sizeof($model->jihozs)?></td>
            <td colspan="8"><a href="<?=Yii::$app->urlManager->createUrl(['site/createjihoz','roomid'=>$model->id])?>">
                    <div class="btn btn-primary btn-plus" id="myBtn">Qo'shish &nbsp;<i class="fa fa-plus"></i></div>
                </a> </td>
        </tr>

        <tr class="thead">
            <th>#</th>
            <th colspan="2">F.I.O</th>
            <th>Turi</th>
            <th>Model</th>
            <th>Seria</th>
            <th>Xona</th>
            <th></th>
        </tr>
        <? foreach ($model->jihozs as $i=>$item) {?>
            <tr>
                <th><?=$i+1?></th>
                <td class="avatar-col"><div class="rounded-avatar"><img src="../../web/image/<?=$item->stuff->image?>"></div></td>
                <td><?=$item->stuff->name?></td>
                <td><?=$item->modell->qurilma->name?></td>
                <td><?=$item->modell->name?></td>
                <td><?=$item->seriya?></td>
                <td><?=$item->room->name?></td>
                <td class="detail-action">
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/productdetails','id'=>$item->modell->id])?>"><i class="fa fa-eye"></i></a>
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/updatejihoz','id'=>$item->id])?>"><i class="fa fa-edit"></i></a>
                    <?= Html::a('<i class="fa fa-trash"></i>', ['jihoz/delete', 'id' => $item->id], [
                        'class' => 'fa fa-frash',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <!--                    <a href="#"><i class="fa fa-trash"></i></a>-->
                </td>
            </tr>
        <?}?>
    </table>
</section>
<?php ActiveForm::end()?>
