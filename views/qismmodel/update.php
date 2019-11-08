<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qismmodel */

$this->title = 'Update Qismmodel: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qismmodels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qismmodel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
