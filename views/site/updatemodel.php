<?php
use app\models\Qismmodel;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$id=$model->qurilma_id;
?>
<?php
$form = ActiveForm::begin(['method'=>'post']);
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
    foreach ($qismmodels as $i=>$item){
        $i++;
        if($item->qismQurilma->type=="input")
        {
                echo $form->field($item,"[$i]name")->textInput(['maxlength'=>true])->label($item->qismQurilma->name);

        }
        else{
            if($item->name=="1")
            echo $form->field($item,"[$i]name")->checkbox([
                    'class'=>'js-switch',
                'checked'=> true,
                'label'=>$item->qismQurilma->name
            ]);
            else{
                echo $form->field($item,"[$i]name")->checkbox([
                    'class'=>'js-switch',
                    'checked'=> false,
                    'label'=>$item->qismQurilma->name
                ]);
            }
        }
    }
    ?>
    <div class="form-group" style="margin-top: 15px">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>


