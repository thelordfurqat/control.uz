<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JihozSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jihozlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jihoz-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Jihoz qo\'shish', ['site/createjihoz'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute'=>'stuff_id',
                'value'=>function($x){return $x->stuff->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Stuff::find()->all(),'id','name')
            ],

            [
                'attribute'=>'modell_id',
                'value'=>function($x){return $x->modell->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Modell::find()->all(),'id','name')
            ],
            [
                'attribute'=>'room_id',
                'value'=>function($x){return $x->room->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Room::find()->all(),'id','name')
            ],
            'seriya',
            //'holati',
            //'more:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
