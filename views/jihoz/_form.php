<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jihoz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jihoz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'modell_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Modell::find()->all(),'id','name'))->label('Modelni Tanlang') ?>

    <?= $form->field($model, 'stuff_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Stuff::find()->all(),'id','name'))->label('Xodimni tanlang') ?>

    <?= $form->field($model, 'room_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Room::find()->all(),'id','name'))->label('Xonani tanlang') ?>

    <?= $form->field($model, 'seriya')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model,'holati')->dropDownList(['2'=>'Yangi','1'=>'Yaxshi','0'=>'Tamirtalab'],[
        'id'=>'holati',
        'onchange'=>"ChangedSelection()",
        'style'=>"background: green; color: white",
    ])?>
    <?= $form->field($model, 'more')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function ChangedSelection()
    {
        var x = document.getElementById("holati").selectedIndex;
        var color =document.getElementsByTagName("option")[x].value;
        var y = document.getElementById("holati");
        if (color === "2") {
            y.style.background="green";
            y.style.color="white";
        }else if (color === "1") {
            y.style.background="yellow";
            y.style.color="black";

        }else if (color === "0") {
            y.style.color="white";
            y.style.background="red";
        } else y.style.background = "black";
    }
</script>
