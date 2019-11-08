<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QismqurilmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qurilma qismi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qismqurilma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Qurilma qismini yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            'name',
            'more:ntext',
            'type',
            [
                'attribute'=>'qurilma_id',
                'value'=>function($x){return $x->qurilma->name; },
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name'),
            ],
//            'qurilma_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
