<?php

namespace app\controllers;

use Yii;
use yii\widgets\Pjax;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\Sotrudniki;
use app\models\SignupForm;
use app\models\Zadachi;
use app\models\User;
use app\models\Tasks;
use app\models\Chat;
use app\models\Post;
use app\models\File;
use app\models\Comment;
use app\models\TaskHirer;


class SiteController extends Controller
{
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
    public function actionIndex()
    {
        
        $model = Chat::findOne($id);   
        $chats = Chat::find()->with('user')->orderBy(['id' => SORT_DESC])->all();
        $chat_model = new Chat();

        if($chat_model->load(Yii::$app->request->post()))
        {
            $chat_model->id_name = Yii::$app->session['id'];
            $chat_model->message = Yii::$app->request->post('Chat')['message'];
            $chat_model->time = date("Y-m-d H:i");
            $chat_model->save();
          
        }

        return $this->render('index', ['model' => $model, 'chat_model' => $chat_model, 'chats' => $chats]);
    }

    public function actionContact()
    {
       
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
  
 public function actionSignup()
    {
        $model = new SignupForm();

        return $this->render('signup', compact('model'));
    }

    public function actionAuthor()
    {
        $model = new SignupForm();

        $check = SignupForm::find()->with('post')->all();

        for($i = 0; $i < count($check); $i++)
        {
            if(Yii::$app->request->post('SignupForm')['username'] == $check[$i]->username &&
                Yii::$app->request->post('SignupForm')['password'] == $check[$i]->password)
            {
                $model = SignupForm::findOne($check[$i]->id);
                $session = Yii::$app->session;
                $session->open();
                $session['status'] = true;
                $session['id'] = $check[$i]->id;
                $session['id_roles'] = $check[$i]->id_roles;
                $session['authority'] = $check[$i]->post->authority;

                return $this->redirect(['index?id='.$session['id'], 'model' => $model, 'session' => $session]);
            }
            else if($i == count($check) - 1)
            {
                $error = 'Неверный логин или пароль';

                return $this->render('signup', ['error' => $error, 'model' => $model]);
            }          
        }
    }

 public function actionCabinet($id)
    {
        
            $model = SignupForm::findOne($id);
            return $this->render('cabinet', compact('model'));
       
    }
    
    public function actionLogout()
    {
        Yii::$app->session->destroy();
        Yii::$app->session->close();
        return $this->redirect('index');
    }

 public function actionSotrudniki()
    {
         $model = Sotrudniki::find()->with(['post'])->all();

        return $this->render('sotrudniki', compact('model'));
       
    }
    public function actionIshzadachi($id)
    {
         $model = Zadachi::find()->where(['emloyment' => $id])->with(['user'])->all();

        return $this->render('ishzadachi', compact('model'));
       
    }
 public function actionZadacha($id)
    { 
      $model1 = new Comment();
      $file = File::find()->with(['comment'])->all();  
      $model3 = TaskHirer::find()->where(['id_task'=> $id])->one();
        $model = Tasks::findOne($id);
       if($model1->load(Yii::$app->getRequest()->post()))
  {
  
     $path = 'upload/';
        $model1->otvet = Yii::$app->request->post('Comment')['otvet'];
     $model1->id_tasks = $model3->id;
           $model1->save();

    }
    return $this->render('zadacha', ['model'=>$model,'model1'=>$model1, 'file'=>$file, 'model3'=>$model3]);
   } 
  public function actionZadachi($id)
    {
         $model = TaskHirer::find()->where(['id_hirer' => $id])->with(['user','tasks'])->all();

        return $this->render('zadachi', compact('model'));
       
    }
     public function actionIndex1()
    {
        
        $model = Chat::findOne($id);   
        $chats = Chat::find()->with('user')->orderBy(['id' => SORT_DESC])->all();
       

        foreach($chats as $chat)
    {
        echo
        "
        <div id='chats' class='' style='margin-bottom: 4px; margin-top: 3px; border: 2px solid black; border-radius:5px';>
            <div style='top: 50px; float: right;'>".$chat->time."</div> 
            <p style='width:350px'>Сотрудник: ".$chat->user->username.":</p>
            <div style='width:350px;' class='text'> ".$chat->message."</div> 
                            
        </div>
        ";
       
    }
      return $this->render('index1');
}
 public function actionVypol($id)
{

     $model2 = new File();
      $model1 = new Comment();
      $file = File::find()->with(['comment'])->all();   
      $model3 = TaskHirer::find()->where(['id_task'=> $id])->one();
        $model = Tasks::findOne($id);
       if($model1->load(Yii::$app->getRequest()->post()))
  {
  $model2->file = UploadedFile::getInstance($model2, 'file');
    
     $path = 'upload/';
        $model1->text = Yii::$app->request->post('Comment')['text'];
     $model1->id_tasks = $model3->id;
           $model1->save();
      $model2->id_comment = $model1->id;
      $model2->save();
     $model2->file->saveAs( $path .$model2->file);
     }
      return $this->render('vypol', ['model'=>$model,'model1'=>$model1, 'model2'=>$model2]);
    }
    public function actionDa($id)
{

     $model = Tasks::findOne($id);
     $model->process='выполнено';
     $model->save();
      return $this->redirect(['ishzadachi?id='.Yii::$app->session['id'], 'model' => $model, 'session' => $session]);
}
public function actionPere($id)
{

     $model = Tasks::findOne($id);
     $model->process='переделать';
        $model->save();

      return $this->redirect(['index', 'model' => $model, ]);
}

public function actionDnevnik()
{
        
      return $this->render(['dnevnik', 'model' => $model, ]);
} }