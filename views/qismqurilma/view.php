<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Qismqurilma */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qismqurilmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="qismqurilma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'more:ntext',
            'type',
//            'qurilma_id',
            [
                'attribute'=>'qurilma_id',
                'value'=>function($x){return $x->qurilma->name; },
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name'),
            ],
        ],
    ]) ?>

</div>
