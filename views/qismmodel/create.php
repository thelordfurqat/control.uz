<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qismmodel */

$this->title = 'Create Qismmodel';
$this->params['breadcrumbs'][] = ['label' => 'Qismmodels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qismmodel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
