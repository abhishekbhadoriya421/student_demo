<?php

namespace app\controllers;

use app\models\Marks;
use app\models\MarkstSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarksController implements the CRUD actions for Marks model.
 */
class MarksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Marks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MarkstSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Marks model.
     * @param int $rno Rno
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rno)
    {
        return $this->render('view', [
            'model' => $this->findModel($rno),
        ]);
    }

    /**
     * Creates a new Marks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new Marks();

        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rno' => $model->rno]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id
        ]);
    }

    /**
     * Updates an existing Marks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rno Rno
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rno)
    {
        $model = $this->findModel($rno);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rno' => $model->rno]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Marks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rno Rno
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rno)
    {
        $this->findModel($rno)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Marks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rno Rno
     * @return Marks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rno)
    {
        if (($model = Marks::findOne(['rno' => $rno])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
