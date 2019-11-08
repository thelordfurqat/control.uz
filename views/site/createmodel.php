<?php
use app\models\Qismmodel;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$id=$model->qurilma_id;
?>
<?php $form = ActiveForm::begin(['method'=>'post']); ?>

<?php if($model->qurilma_id==null) echo $form->field($model,'qurilma_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name'),[
    'prompt'=>'Qurilma turini tanlang',
    'onchange'=>'this.form.submit()'
])->label('Qurilma turi') ?>

<?php ActiveForm::end(); ?>
<?php
$form = ActiveForm::begin(['action'=>'getmodel', 'method'=>'post']);

if($model->qurilma_id!=null)
{

    echo $form->field($model,'qurilma_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Qurilma::find()->all(),'id','name'),[
    'prompt'=>'Qurilma turini tanlang',
    'onchange'=>'this.form.submit()'
])->label('Qurilma turi');
    echo $form->field($model,'name')->textInput([
        'maxlength'=>true,
        'placeholder'=>'Model nomini kiriting',
    ])->label('Model nomi');?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    <?php $i=0;
    foreach ($qismqurilma as $item){
        $i++;

        $qismmodel=new Qismmodel();
        if($model->qismmodels[$i-1]!=null)
        $qismmodel=$model->qismmodels[$i-1];

//        echo $form->field($qismmodel[$i],'name[]')->textInput(['maxlength'=>true])->label($item->name);

        if($item->type=="input")
        {
            echo $form->field($qismmodel,'name[]')->textInput(['maxlength'=>true,'name'=>$item->name])->label($item->name);

//            echo Html::textInput($item->name,null,['label'=>$item->name, 'class'=>'form-control']);
        }
        else{
            echo $form->field($qismmodel,'name[]')->checkbox(['class'=>'js-switch','name'=>$item->name,'checked'=>true,'label'=>$item->name]);
//            echo Html::checkbox($item->name, true, $options = ['label' => $item->name, 'class'=>'js-switch']).'&nbsp&nbsp&nbsp&nbsp';

        }
        $item->qurilma_id=$id;
    }
    $model->qurilma_id=$id;
?>
<div class="form-group" style="margin-top: 15px">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
</div>
<?php } ActiveForm::end(); ?>


