<?php

use app\models\Marks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MarkstSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Marks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'english',
            'maths',
            'hindi',
            'totalMarks',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Marks $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'rno' => $model->rno]);
                 }
            ],
        ],
    ]); ?>


</div>
