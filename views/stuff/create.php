<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stuff */

$this->title = 'Xodim Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Xodimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
