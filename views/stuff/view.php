<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Stuff */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Xodimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stuff-view">
    <div class="row">
        <div class="col-sm-6">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-sm-6">
            <div style="float: right">
                <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'image',
                'value'=>function($d){
                    return "<object data='/web/image/{$d->image}' type='image/png' style='width: 100px'><img src='/web/image/avatar.jpg' style='width:100px;'></object>";
                },
                'filter'=>false,
                'format'=>'raw'
            ],
            'id',
            'name',
            'tel',
//            'image',
            'more:ntext',
        ],
    ]) ?>

</div>
<?php ActiveForm::begin([
        'action'=>'jihoz'

])?>
<section class="section-users" style="height: 100%">
    <table>
        <tr>
           <td></td>
            <td colspan="2"></td>
            <td></td>
            <td><a href="<?=Yii::$app->urlManager->createUrl(['site/createjihoz','stuffid'=>$model->id])?>" <div class="btn btn-primary btn-plus" id="myBtn">Qo'shish &nbsp;<i class="fa fa-plus"></i></div></td>
        </tr>
        <tr class="thead">
            <th>#</th>
            <th colspan="1">Model</th>
            <th>Seria</th>
            <th>Xona</th>
            <th></th>
        </tr>
        <? foreach ($model->jihozs as $i=>$jihoz) {?>
            <tr>
                <th><?=$i+1?></th>
                <td><?=$jihoz->modell->name?></td>
                <td><?=$jihoz->seriya?></td>
                <td><?=$jihoz->room->name?></td>
                <td class="detail-action">
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/updatejihoz','id'=>$jihoz->id])?>"><i class="fa fa-edit"></i></a>
                    <?= Html::a('<i class="fa fa-trash"></i>', ['jihoz/delete', 'id' => $jihoz->id], [
                        'class' => 'fa fa-frash',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?}?>

    </table>
</section>
<?php ActiveForm::end()?>
<!---->
<!--<div class="modal-content">-->
<!--    <span class="close">&times;</span>-->
<!--      --><?php
//      $form = ActiveForm::begin(['method'=>'post','action'=>'createjihoz']);?>
<!--      --><?php
//        if(Yii::$app->session->hasFlash('error')):?>
<!--            <div class="alert alert-danger alert-dismissible" role="alert">-->
<!--                <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times</span>-->
<!--                </button>-->
<!--                --><?//=Yii::$app->session->getFlash('error') ?>
<!--            </div>-->
<!--      --><?php //endif;?>
<!--        <h1 class="product-title">--><?//=$model->name?><!--</h1>-->
<!--        <label>F.I.O:</label><br>-->
<!--        <input type="text" placeholder="F.I.O ni kiriting" name="stuffName"><br>-->
<!--        <label>Avatarni tanlang:</label><br>-->
<!--        <input type="file" style="border: none" name="stuffImage"><br>-->
<!--        <label>Seria:</label><br>-->
<!--        <input type="text" placeholder="Seriani kiriting" name="jihozSeriya"><br>-->
<!--        <label>Xona:</label><br>-->
<!--        <input type="text" placeholder="Xonani kiriting" name="roomName"><br>-->
<!--      <label class="control-label col-md-3 col-sm-3 col-xs-12">Holati</label>-->
<!--      <select name="holati" id="holati" class="form-control" onchange="ChangedSelection()">-->
<!--          <option value="" disabled selected>Qurilma holatini tanlang</option>-->
<!--          <option value="2">Yangi</option>-->
<!--          <option value="1">Yaxshi</option>-->
<!--          <option value="0">Tamirtalab</option>-->
<!--      </select><br>-->
<!---->
<!--      <script>-->
<!--          function ChangedSelection()-->
<!--          {-->
<!--              var x = document.getElementById("holati").selectedIndex;-->
<!--              var color =document.getElementsByTagName("option")[x].value;-->
<!--              var y = document.getElementById("holati");-->
<!--              if (color == "1") {-->
<!--                  y.style.background="yellow";-->
<!--              }else if (color == "0") {-->
<!--                  y.style.background="red";-->
<!--              }else if (color == "2") {-->
<!--                  y.style.background="green";-->
<!--              } else y.style.background = "black";-->
<!--              y.style.color="white";-->
<!--          }-->
<!--      </script>-->
<!---->
<!--      <input type="text" value="--><?//=$model->id?><!--" name="modelId" style="display: none">-->
<!--      <button type="submit" class="btn btn-success" style="float: right;">Saqlash</button>-->
<!--          --><?php //ActiveForm::end(); ?>
<!---->
<!--  </div>-->
<!---->
<!---->
<!---->
<!--<script>-->
<!--var modal = document.getElementById('myModal');-->
<!--var btn = document.getElementById("myBtn");-->
<!--var span = document.getElementsByClassName("close")[0];-->
<!--btn.onclick = function() {-->
<!--  modal.style.display = "block";-->
<!--}-->
<!--span.onclick = function() {-->
<!--  modal.style.display = "none";-->
<!--}-->
<!--window.onclick = function(event) {-->
<!--  if (event.target == modal) {-->
<!--    modal.style.display = "none";-->
<!--  }-->
<!--}-->
<!--</script>-->
