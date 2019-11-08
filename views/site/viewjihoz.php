<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 19.04.2019
 * Time: 17:54
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Jihozlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php ActiveForm::begin(['action'=>'jihoz'])?>
<section class="section-users" style="height: 100%">
    <table style="margin-top: -40px;">
        <tr>
            <td colspan="1" style="padding-top: 25px;">Soni:<?=sizeof($model)?></td>
            <td colspan="8"><a href="<?=Yii::$app->urlManager->createUrl(['site/createjihoz'])?>">
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
        <? foreach ($model as $i=>$item) {?>
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
