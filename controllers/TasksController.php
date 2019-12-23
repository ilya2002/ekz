<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Tasks;
use app\models\TaskHirer;
use app\models\TasksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->session['id_roles'] == '1') {
    
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }   else { return $this->render ('../site/dostup');}
    }


    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
   {
    
        return $this->render('view', [
            'model' => $this->findModel($id),

        ]);
}
       

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();
        $model1 = new TaskHirer();

        if ($model->load(Yii::$app->request->post())) {
           $model->emloyment=Yii::$app->session['id'];
           $model->process="В работе";
           $model->save();
        
        for($i=0; $i < count(Yii::$app->request->post('TaskHirer')['id_hirer']); $i++){
           $model1 = new TaskHirer();
     $model1->id_hirer = Yii::$app->request->post('TaskHirer')['id_hirer'][$i];
     $model1->id_task = $model->id;

            $model1->save();}
            return $this->redirect(['view', 'id' => $model->id]);
          
 }
        return $this->render('create', [
            'model' => $model, 'model1' => $model1]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionRemove($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
