<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qismqurilma */

$this->title = 'Qismni yangilash: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qurilma qismi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="qismqurilma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
