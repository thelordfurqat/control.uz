<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Qismqurilma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qismqurilma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qurilma_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'more')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'type')->dropDownList(['checkbox'=>'Checkbox','input'=>'Matnli'])?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
