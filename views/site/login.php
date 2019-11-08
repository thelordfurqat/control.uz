<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signin" style="color: white;">
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>Please fill out the following fields to login:</p>-->
<br>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username','class'=>'user',])->label('') ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password','class'=>'pass',])->label('') ?>

    <label>
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
    </label>
    <input type="submit" value="LOGIN" />

    <?php ActiveForm::end(); ?>
</div>
</div>