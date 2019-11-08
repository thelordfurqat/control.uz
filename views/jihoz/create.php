<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jihoz */

$this->title = 'Create Jihoz';
$this->params['breadcrumbs'][] = ['label' => 'Jihozs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jihoz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
