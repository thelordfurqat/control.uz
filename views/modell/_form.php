<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modell */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modell-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qurilma_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'more')->textarea(['rows' => 3]) ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
