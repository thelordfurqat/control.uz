<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Modell */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Modellar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="modell-view">

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
            [
                'attribute'=>'image',
                'value'=>function($d){
//                    return "<img src='/web/image/{$d->image}' onerror='this.src=;' style='width:100px;' >";
                    return "<object data='/web/image/{$d->image}' type='image/png' style='width: 100px'><img src='/web/image/deviceAvatar.jpg' style='width:100px;'></object>";

                },
                'filter'=>false,
                'format'=>'raw'
            ],

            'id',
            'name',
            //'qurilma_id',
            [
                'attribute'=>'qurilma_id',
                'value'=>function($x){return $x->qurilma->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name')
            ],


//            'image',
            'more:ntext',
//            'qurilma_id',
        ],
    ]) ?>

</div>
