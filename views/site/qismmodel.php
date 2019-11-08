<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 10.04.2019
 * Time: 20:12
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['action'=>'getmodel','method'=>'post']); ?>

<?= $form->field($qismmodel[0],'modell_id')->dropDownList(\yii\helpers\ArrayHelper::map($modell,'id','name'),[
        'prompt'=>'Modelni tanlang',
    'onchange'=>'this.form.submit()'
])->label('Modelni tanlang') ?>

<?php ActiveForm::end(); ?>

