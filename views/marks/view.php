<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */

$this->title = $model->rno;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'rno' => $model->rno], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rno',
            'id',
            'english',
            'maths',
            'hindi',
            'createAt',
            'updatedAt',
            'totalMarks',
        ],
    ]) ?>

</div>
