<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' =>SecurityHelper::hashData( $model->id)], ['class' => 'btn btn-primary']) ?>
        <?php if(!empty($studentMarks)):?>
        <?= Html::a(Yii::t('app', 'UpdateMarks'), ['marks/update', 'rno' =>$studentMarks[0]["rno"]], ['class' => 'btn btn-success']) ?>
<!--            --><?php //= Html::a(Yii::t('app', 'UpdateMarks'), ['marks/update', 'rno' =>SecurityHelper::hashData( $studentMarks[0]["rno"])], ['class' => 'btn btn-success']) ?>

        <?php else: ?>
        <?= Html::a(Yii::t('app', 'AddMarks'), ['marks/create', 'id' =>SecurityHelper::hashData( $model->id)], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'category',
            'mobile',
            'email:email',
            'createdAt',
            'gender',
        ],
    ]) ?>

</div>
