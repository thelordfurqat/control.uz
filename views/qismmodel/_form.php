<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Qismmodel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qismmodel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'more')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'modell_id')->textInput() ?>

    <?= $form->field($model, 'qism_qurilma_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
