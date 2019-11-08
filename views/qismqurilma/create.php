<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qismqurilma */

$this->title = 'Qurilma qismini yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Qurilma qismi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qismqurilma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
