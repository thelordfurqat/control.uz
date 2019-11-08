<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JihozSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jihoz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'modell_id') ?>

    <?= $form->field($model, 'stuff_id') ?>

    <?= $form->field($model, 'room_id') ?>

    <?= $form->field($model, 'seriya') ?>

    <?php // echo $form->field($model, 'holati') ?>

    <?php // echo $form->field($model, 'more') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
