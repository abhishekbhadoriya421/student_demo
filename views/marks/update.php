<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */

$this->title = Yii::t('app', 'Update Marks: {name}', [
    'name' => $model->rno,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rno, 'url' => ['view', 'rno' => $model->rno]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="marks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $model->id
    ]) ?>

</div>
