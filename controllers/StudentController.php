<?php

namespace app\controllers;

use app\models\Student;
use app\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\SecurityHelper;
use Yii;
use yii\web\UploadedFile;
use app\models\Statemaster;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $new_Data = SecurityHelper::validateData($id);
        $studentMarks = Yii::$app->db->createCommand("select english,hindi,maths,rno from task.marks where id  = $new_Data")->queryAll();
        return $this->render('view', [
            'model' => $this->findModel($new_Data),
            'studentMarks' => $studentMarks
        ]);
    }


    public function actionCreate()
    {
        $model = new Student();


        if ($this->request->isPost) {
            $data = $this->request->post();
            if ($model->load($this->request->post()) ){
                if($data['Student']['category'] !== 'GEN'){
                    $imageName = time();
                    $model->imageFile = UploadedFile::getInstance($model,'imageFile');
                    $model->imageFile->saveAs('uploads/'.$imageName.'.'.$model->imageFile->extension);
                    $model->imageFile = 'uploads/'.$imageName.'.'.$model->imageFile->extension;
                }
                $model->save();
                return $this->redirect(['view', 'id' => SecurityHelper::hashData($model->id) ]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $newId = SecurityHelper::validateData($id);
        $model = $this->findModel($newId );

//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        if ($this->request->isPost) {
            $data = $this->request->post();
            if ($model->load($this->request->post()) ){
                if($data['Student']['category'] !== 'GEN'){
                    $imageName = time();
                    $model->imageFile = UploadedFile::getInstance($model,'imageFile');
                    $model->imageFile->saveAs('uploads/'.$imageName.'.'.$model->imageFile->extension);
                    $model->imageFile = 'uploads/'.$imageName.'.'.$model->imageFile->extension;
                }
                $model->save();
                return $this->redirect(['view', 'id' => SecurityHelper::hashData($model->id) ]);
            }
        }  else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {

        if (($model = Student::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionStateDistrict($state)
    {
        $districts = Statemaster::getDistrictList($state);
        $content = '<option value="">Select</option>';
        if (!empty($districts)) {
            foreach ($districts as $district) {
                $content .= "<option value='" . $district . "'>" . $district . "</option>";
            }
        }

        return $this->renderPartial('state-district',   ['content'=>$content] );
    }



}
