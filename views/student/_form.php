<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\StudentAsset;
use app\models\Statemaster;
/** @var yii\web\View $this */
/** @var app\models\Student $model */
/** @var yii\widgets\ActiveForm $form */

StudentAsset::register($this);
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

   <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true])->dropDownList(["GEN"=>"GEN","OBC"=>"OBC","SC"=>"SC","ST"=>"ST"]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength'=>10]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model,'state')->dropDownList(Statemaster::getStateList(),['prompt'=>'Select'])?>

    <?= $form->field($model, 'state')->dropDownList(Statemaster::getStateList(), [
        'prompt' => 'Select',
        'onchange' => '
         $.post("' . Yii::$app->urlManager->createUrl('student/state-district?state=') . '"+$(this).val(), function( data ) {
         $( "#student-district" ).html( data );
          });']) ?>

<!--    --><?php //=$form->field($model,'state')->dropDownList(Statemaster::getStateList(),[
//        'prompt' => 'Select',
//        'onchange'=>'$.post("'.Yii::$app->urlManager->createUrl('student/state-district?state=').'"+$(this).val(),function(data){
//        $("#student-district").html(data);});'
//    ]) ?>

<!--    --><?php //= $form->field($model, 'district')->dropDownList(Statemaster::getDistrictList($model->state), ['prompt' => 'Select']) ?>
    <?= $form->field($model, 'district')->dropDownList(['prompt' => 'Select']) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true])->dropDownList(["Male"=>"Male","Female"=>"Female","Others"=>"Others"]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
