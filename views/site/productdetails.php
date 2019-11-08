<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 18.04.2019
 * Time: 15:24
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Qurilma';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<h3 class="product-title">Qurilma haqida</h3>-->
<section class="section-details">

    <div class="detail-img-box">
        <img class="detail-img" src="<?=Yii::$app->homeUrl?>image/<?=$model->image?>">
    </div>


    <div class="detail-info">
      <div class="row">
          <div class="col-sm-6">
             <h3 class="detail-title"><?=$model->qurilma->name?></h3>
          </div>
          <div class="col-sm-6">
              <?= Html::a('O\'chirish', ['modell/delete', 'id' => $model->id], [
                  'class' => 'btn btn-danger btn-action',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                  ],
              ]) ?>
<!--              <button  class="btn btn-danger btn-action">O'chirish</button>-->
              <a href="<?=Yii::$app->urlManager->createUrl(['site/updatemodel','id'=>$model->id])?>"><button class="btn btn-primary btn-action">Yangilash</button></a>
          </div>
        </div>
        <table>
            <tr>
                <th valign="top">Modeli:</th>
                <td><?=$model->name?></td>
            </tr>
            <tr>
                <th valign="top">Tavsifi:</th>
                <td><?=$model->more?></td>
            </tr>
            <? foreach ($qismmodel as $item) {?>
                <tr>
                    <th valign="top"><?=$item->qismQurilma->name?></th>
                    <?php if($item->qismQurilma->type!="checkbox"){?>
                    <td><?=$item->name?></td>
                    <?} else if($item->name=="1"){?>
                    <td><i class="fa fa-check detail-yes"></i></td>
                    <?} else{?>
                        <td><i class="fa fa-close detail-no"></i></td>
                    <?}?>
                </tr>
            <?}?>

        </table>
    </div>
</section>
<?php ActiveForm::begin(['action'=>'jihoz'])?>
<section class="section-users" style="height: 100%">
    <table>
        <tr>
           <td></td>
            <td colspan="3"><?=$model->name?></td>
            <td><span style="float: right">Soni: <span class="detail-count"><?=sizeof($model->jihozs)?></span></span></td>
            <td><div class="btn btn-primary btn-plus" id="myBtn">Qo'shish &nbsp;<i class="fa fa-plus"></i></div></td>
        </tr>
        <tr class="thead">
            <th>#</th>
            <th colspan="2">F.I.O</th>
            <th>Seria</th>
            <th>Xona</th>
            <th></th>
        </tr>
        <? if($model->jihozs!=null){?>
        <? foreach ($model->jihozs as $i=>$jihoz) {?>
            <tr>
                <th><?=$i+1?></th>
                <td class="avatar-col"><div class="rounded-avatar"><img src="../../web/image/<?=$jihoz->stuff->image?>"></div></td>
                <td><?=$jihoz->stuff->name?></td>
                <td><?=$jihoz->seriya?></td>
                <td>142</td>
                <td class="detail-action">
<!--                    <a href="#"><i class="fa fa-eye"></i></a>-->
                    <a href="<?=Yii::$app->urlManager->createUrl(['site/updatejihoz','id'=>$jihoz->id])?>"><i class="fa fa-edit"></i></a>
<!--                    <a href="#"><i class="fa fa-trash"></i></a>-->
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

        <?}?>

    </table>
</section>
<?php ActiveForm::end()?>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
    <?php
    $stuff=new \app\models\Stuff();
    $room=new \app\models\Room();
    $jihoz=new \app\models\Jihoz();
    ?>

  <div class="modal-content">
    <span class="close">&times;</span>
      <?php
      $form = ActiveForm::begin(['method'=>'post','action'=>'createjihoz']);?>
      <?php
        if(Yii::$app->session->hasFlash('error')):?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
                <?=Yii::$app->session->getFlash('error') ?>
            </div>
      <?php endif;?>
        <h1 class="product-title"><?=$model->name?></h1>
        <label>F.I.O:</label><br>
        <input type="text" placeholder="F.I.O ni kiriting" name="stuffName"><br>
        <label>Avatarni tanlang:</label><br>
      <?=$form->field($stuff,'image')->fileInput(['maxlength'=>true,'style'=>'border: none'])->label('')?>
<!--        <input type="file" style="border: none" name="stuffImage"><br>-->
        <label>Seria:</label><br>
        <input type="text" placeholder="Seriani kiriting" name="jihozSeriya"><br>
        <label>Xona:</label><br>
        <input type="text" placeholder="Xonani kiriting" name="roomName"><br>
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Holati</label>
      <select name="holati" id="holati" class="form-control" style="background: green; color: white" onchange="ChangedSelection()">
          <option value="2">Yangi</option>
          <option value="1">Yaxshi</option>
          <option value="0">Tamirtalab</option>
      </select><br>

      <script>
          function ChangedSelection()
          {
              var x = document.getElementById("holati").selectedIndex;
              var color =document.getElementsByTagName("option")[x].value;
              var y = document.getElementById("holati");
              if (color == "1") {
                  y.style.background="yellow";
                  y.style.color="black";
              }else if (color == "0") {
                  y.style.color="white";
                  y.style.background="red";
              }else if (color == "2") {
                  y.style.background="green";
                  y.style.color="white";
              } else y.style.background = "black";
          }
      </script>

      <input type="text" value="<?=$model->id?>" name="modelId" style="display: none">
      <button type="submit" class="btn btn-success" style="float: right;">Saqlash</button>
          <?php ActiveForm::end(); ?>

  </div>

</div>


<script>
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>