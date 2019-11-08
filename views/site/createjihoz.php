<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 19.04.2019
 * Time: 15:25
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;

$stuffs = \app\models\Stuff::find()
    ->select(['name as value', 'name as  label','id as id'])
    ->asArray()
    ->all();
$rooms=\app\models\Room::find()->select(['name as value', 'name as label','id as id'])->asArray()->all();
?>

<h1 class="product-title">Qurilma qo'shish</h1>

<div class="create-equip">
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

        <label>Modelni tanlang:</label>
        <?=$form->field($model,'modell_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Modell::find()->all(),'id','name'),[
            'style' => "border-radius: 8px; border: 1px solid #999"
        ])->label('') ?>

        <label>F.I.O:</label><br>
    <?=AutoComplete::widget([
        'model' => $stuff,
        'attribute' => 'name',
        'clientOptions' => [
            'source' => $stuffs,
            'autoFill'=>true,
            'minLength'=>'1',
            'select' => new JsExpression("function( event, ui ) {
                $('#user-company').val(ui.item.id);
            }")
        ],
    ]);?>
        <label>Avatarni tanlang:</label><br>
    <?=$form->field($stuff,'image')->fileInput(['style'=>'border: none;'])->label('') ?>


    <?=$form->field($model,'seriya')->textInput(['maxlength'=>true])?>
    <?=$form->field($model,'holati')->dropDownList(['1'=>'Yangi','0'=>'Yaxshi','-1'=>'Tamirtalab'],[
            'id'=>'holati',
        'onchange'=>"ChangedSelection()",
        'style'=>"background: green; color: white; border: 1px solid #999; border-radius: 8px; padding: 10px; width: 100%",
        'class'=>'select-holat'
    ])?>
        <label>Xona:</label><br>
    <?=AutoComplete::widget([
        'model' => $room,
        'attribute' => 'name',
        'clientOptions' => [
            'source' => $rooms,
            'autoFill'=>true,
            'minLength'=>'1',
            'select' => new JsExpression("function( event, ui ) {
                $('#user-company').val(ui.item.id);
            }")
        ],
    ]);?>

        <button type="submit" class="btn btn-success" style="float: right;">Saqlash</button>
    <?php ActiveForm::end(); ?>
</div>


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
