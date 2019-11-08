<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QismmodelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qismmodels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qismmodel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Qismmodel', ['create'], ['class' => 'btn btn-success']) ?>
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
            'modell_id',
            'qism_qurilma_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
