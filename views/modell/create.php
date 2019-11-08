<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modell */

$this->title = 'Model yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Modellar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modell-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
