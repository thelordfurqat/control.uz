<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModellSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Modellar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modell-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Model yaratish', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute'=>'image',
                'value'=>function($d){
//                    return "<img src='/web/image/{$d->image}' onerror='this.src=;' style='width:100px;' >";
                    return "<object data='/web/image/{$d->image}' type='image/png' style='width: 100px'><img src='/web/image/deviceAvatar.jpg' style='width:100px;'></object>";

                },
                'filter'=>false,
                'format'=>'raw'
            ],
            'name',
            //'qurilma_id',
            [
                'attribute'=>'qurilma_id',
                'value'=>function($x){return $x->qurilma->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name')
            ],

//            'image',


            'more:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
