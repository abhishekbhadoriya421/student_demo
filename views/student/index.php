<?php

use app\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;

$data = $dataProvider->getModels();

?>


<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            [
//                'attribute' => 'id',
//                'footer'=> '100'
//            ],
            'name',
            [
                'attribute' => 'category',

                'filter'=> $searchModel->getAllCategory(),
                'filterInputOptions' =>[
                        'prompt' =>'Select Category'
                ]
            ],
            'mobile',
            'email:email',

            [
                'attribute'=> 'imageFile',
                'format'=>'raw',
                'value'=>function($model){
                    return Html::img(Url::to([$model->imageFile], true), ['style' => 'width:100px;height:auto;']);
                },
            ],
            [
                    'attribute'=>'gender',
                    'filter'=>['male'=>'M','female'=>'F'],
                    'filterInputOptions'=>[
                            'prompt'=>'Select Gender'
                    ]
            ]
            ,[
                'class'=>ActionColumn::className(),
                'template'=>'{abhishek}{view}{update}',
                'urlCreator' => function ($action, Student $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => SecurityHelper::hashData($model->id) ]);
                },
                'buttons'=>[
                        'abhishek'=> function ($url,$model,$key) {
                                return ($model->id)? Html::a('abhishek',['update','id'=> SecurityHelper::hashData($model->id)],['class'=>'btn btn-primary']) :null;
                    }
                ]

            ]
            ]
    ]) ?>
</div>



