<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="marks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput()->hiddenInput(['value'=> $id ])->label(false)?>
<!--    --><?php //= $form->field($model, 'id')->textInput(['value'=> SecurityHelper::validateData($id) ])?>

    <?= $form->field($model, 'english')->textInput() ?>

    <?= $form->field($model, 'maths')->textInput() ?>

    <?= $form->field($model, 'hindi')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
