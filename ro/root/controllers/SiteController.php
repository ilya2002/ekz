<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Station;
use app\models\Train;
use app\models\Timetable;
use app\models\Ticket;
use app\models\Traintype;
use app\models\Comment;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function actionIndex()
    {
    	$model = new Timetable();

        $ticket = new Ticket();

        return $this->render('index', ['model' => $model, 'ticket' => $ticket]);
    }

    //USER

    public function actionRegistration()
    {
    	$model = new User();

    	if($model->load(Yii::$app->request->post()) &&
    		$model->save())
    	{
    		return $this->redirect('index');
    	}
    	else
    	{
    		return $this->render('registration', compact('model'));
    	}
    	
    }

    public function actionAuthorization()
    {
    	$model = new User();

    	if($model->load(Yii::$app->request->post()))
    	{
	    	$check = User::find()->all();

	    	for($i = 0; $i < count($check); $i++)
	    	{
		    	if(Yii::$app->request->post('User')['login'] == $check[$i]->login &&
		    		Yii::$app->request->post('User')['password'] == $check[$i]->password)
		    	{
			    	$model = User::findOne($check[$i]->id);

			    	Yii::$app->session->open();
			    	Yii::$app->session['status'] = true;
                    Yii::$app->session['id'] = $check[$i]->id;
			    	Yii::$app->session['login'] = $check[$i]->login;

			    	return $this->redirect(['cabinet?id='.Yii::$app->session['id'], 'model' => $model]);
			    }
			    else if($i == count($check) - 1)
			    {
			    	$error = 'Неверный логин или пароль';

			    	return $this->render('authorization', ['error' => $error, 'model' => $model]);
			    }
			}
		}
		else
		{
	    	return $this->render('authorization', compact('model'));
	    }
    }

    public function actionCabinet($id)
    {
    	if(Yii::$app->session['status'])
    	{
    		$model = User::findOne($id);
    		return $this->render('cabinet', compact('model'));
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    	
    }

    public function actionLogout()
    {
    	Yii::$app->session->destroy();
    	Yii::$app->session->close();
    	return $this->redirect('authorization');
    }

    public function actionHistory($id)
    {
        $model = Ticket::find()->where(['id_user' => $id, 'status' => 'Продано'])->orderBy(['id' => SORT_DESC])->all();
        $stations = Station::find()->all();

        return $this->render('history', ['model' => $model, 'stations' => $stations]);
    }

    public function actionBook($id)
    {
        $model = Ticket::find()->where(['id_user' => $id, 'status' => 'Бронь'])->all();
        $stations = Station::find()->all();


        return $this->render('book', ['model' => $model, 'stations' => $stations]);
    }

    //USER_END

    //STATION

    public function actionStation()
    {
    	if(Yii::$app->session['id'] == 1)
    	{
    		$model = Station::find()->all();

    		return $this->render('station', compact('model'));
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    }

    public function actionAddstation()
    {
    	if(Yii::$app->session['id'] == 1)
    	{
    		$model = new Station();

    		if($model->load(Yii::$app->request->post()) && 
    			$model->save())
	    	{
	    		return $this->redirect('station');
	    	}
	    	else
	    	{
    			return $this->render('addstation', compact('model'));
    		}
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    }

    public function actionUpdatestation($id)
    {
    	if(Yii::$app->session['id'] == 1)
    	{
    		$model = Station::findOne($id);

    		if($model->load(Yii::$app->request->post()))
	    	{
	    		$model->name = Yii::$app->request->post('Station')['name'];
	    		$model->save();

	    		return $this->redirect('station');
	    	}
	    	else
	    	{
    			return $this->render('updatestation', compact('model'));
    		}
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    }

    public function actionDeletestation($id)
    {
    	$model = Station::findOne($id);
    	$model->delete();

    	return $this->redirect('station');
    }

    //STATION_END

    //TRAIN

    public function actionTrain()
    {
		if(Yii::$app->session['id'] == 1)
    	{
    		$model = Train::find()->all();

			return $this->render('train', compact('model'));
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    }

    public function actionAddtrain()
    {
    	if(Yii::$app->session['id'] == 1)
    	{
    		$model = new Train();

    		if($model->load(Yii::$app->request->post()) &&
	    		$model->save())
	    	{
	    		Yii::$app->request->post('Train')['info'] = nl2br(Yii::$app->request->post('Train')['info']);

	    		$image = UploadedFile::getInstance($model,'image');

	            $imagepath = 'upload/';

	            if($image)
	            {
	            	$model->image = $imagepath.$image;
	            	if($model->save())
		            {
		            	$image->saveAs($imagepath.$image);
		            }
	            }

	    		return $this->redirect('train');
	    	}
	    	else
	    	{
	    		return $this->render('addtrain', compact('model'));
	    	}
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    }

    public function actionUpdatetrain($id)
    {
    	if(Yii::$app->session['id'] == 1)
    	{
    		$model = Train::findOne($id);

    		if($model->load(Yii::$app->request->post()))
	    	{
	    		Yii::$app->request->post('Train')['info'] = nl2br(Yii::$app->request->post('Train')['info']);
	    		$model->name = Yii::$app->request->post('Train')['name'];
	    		$model->save();
	    		$model->info = Yii::$app->request->post('Train')['info'];
	    		$model->save();

	    		$image = UploadedFile::getInstance($model,'image');

	            $imagepath='upload/';

	            if($image)
	            {
	            	$model->image = $imagepath.$image;
	            }

	            if($model->save() && $image)
	            {
	            	$image->saveAs($imagepath.$image);
	            }

	    		return $this->redirect('train');
	    	}
	    	else
	    	{
    			return $this->render('updatetrain', compact('model'));
	    	}
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    }
    
    public function actionDeletetrain($id)
    {
    	$model = Train::findOne($id);
    	$model->delete();

    	return $this->redirect('train');
    }

    public function actionTrain_info($id)
    {
    	$model = Train::findOne($id);	
        $comments = Comment::find()->with('user')->where(['id_train' => $id])->orderBy(['id' => SORT_DESC])->all();
        $comment_model = new Comment();
 
        if($comment_model->load(Yii::$app->request->post()))
        {
            $comment_model->id_sender = Yii::$app->session['id'];
            $comment_model->text = Yii::$app->request->post('Comment')['text'];
            $comment_model->id_train = $id;
            $comment_model->save();

            return $this->redirect(['train_info?id='.$id, '#' => 'comments']);
        }

    	return $this->render('train_info', ['model' => $model, 'comment_model' => $comment_model, 'comments' => $comments]);
    }

    public function actionTrains_info()
    {
    	$model = Train::find()->all();

    	return $this->render('trains_info', compact('model'));
    }

    //TRAIN_END

    //TIMETABLE

    public function actionTimetable()
    {
    	$model = new Timetable();
        $today = date("Y-m-d H:i:s", strtotime("+3 hours"));

    	if($model->load(Yii::$app->request->post()))
    	{
    		$model = Timetable::find()->with(['train'])->where(['like', 'date_start', Yii::$app->request->post('Timetable')['date_start']])
    		->andWhere(['id_from' =>Yii::$app->request->post('Timetable')['id_from']])
    		->andWhere(['id_to' =>Yii::$app->request->post('Timetable')['id_to']])
    		->all();

            foreach($model as $el)
            {
                if(date("Y-m-d H:i:s", strtotime($el->date_end."+1 hours")) < $today)
                {
                    $el->date_start = date("Y-m-d H:i:s", strtotime($el->date_start."+1 days"));
                    $el->save();
                    $el->date_end = date("Y-m-d H:i:s", strtotime($el->date_end."+1 days"));
                    $el->save();
                }
            }

    		$stations = Station::find()->all();

    		return $this->render('timetable', ['model' => $model, 'stations' => $stations]);
    	}
    	else
    	{
	    	$model = Timetable::find()->with(['train'])->all();
	    	$stations = Station::find()->all();

            foreach($model as $el)
            {
                if(date("Y-m-d H:i:s", strtotime($el->date_end."+1 hours")) < $today)
                {
                    $el->date_start = date("Y-m-d H:i:s", strtotime($el->date_start."+1 days"));
                    $el->save();
                    $el->date_end = date("Y-m-d H:i:s", strtotime($el->date_end."+1 days"));
                    $el->save();
                }
            }

	    	return $this->render('timetable', ['model' => $model, 'stations' => $stations]);
	    }
    }

    public function actionAddtimetable()
    {
    	if(Yii::$app->session['id'] == 1)
    	{
    		$model = new Timetable();

    		if($model->load(Yii::$app->request->post()) &&
	    		$model->save())
	    	{
	    		return $this->redirect('timetable');
	    	}
	    	else
    		{	
    			return $this->render('addtimetable', compact('model'));
    		}
    	}
    	else
    	{
    		return $this->redirect('index');
    	}
    }

    public function actionUpdatetimetable($id)
    {
    	if(Yii::$app->session['id'] == 1)
    	{
    		$model = Timetable::findOne($id);

    		if($model->load(Yii::$app->request->post()))
	    	{
	    		$model->id_train = Yii::$app->request->post('Timetable')['id_train'];
	    		$model->save();
	    		$model->id_from = Yii::$app->request->post('Timetable')['id_from'];
	    		$model->save();
	    		$model->id_to = Yii::$app->request->post('Timetable')['id_to'];
	    		$model->save();
	    		$model->date_start = Yii::$app->request->post('Timetable')['date_start'];
	    		$model->save();
	    		$model->date_end = Yii::$app->request->post('Timetable')['date_end'];
	    		$model->save();

	    		return $this->redirect('timetable');
	    	}
	    	else
	    	{
    			return $this->render('updatetimetable', compact('model'));
	    	}
    	}
    	else
    	{
    		return $this->redirect('index');
    	}

    	
    }

    public function actionDeletetimetable($id)
    {
    	$model = Timetable::findOne($id);
    	$model->delete();

    	return $this->redirect('timetable');
    }

    ///TIMETABLE_END

    //TICKET

    public function actionTicket($id, $count = null, $status)
    {
    	$model = new Ticket();
        $timetable = Timetable::findOne($id);

		if($model->load(Yii::$app->request->post()))
		{
			$traintype = Traintype::findOne(Yii::$app->request->post('Ticket')['id_traintype']);

			$ticket_data = array(
				'id_from' => $timetable->id_from,
				'id_to' => $timetable->id_to,
				'date_start' => $timetable->date_start,
				'date_end' => $timetable->date_end,
				'id_traintype' => Yii::$app->request->post('Ticket')['id_traintype'],
				'count' => $count,
				'price' => $traintype->price,
				'full_price' => $count * $traintype->price,
				'status' => $status,
			);

			return $this->render('passengers', ['model' => $model, 'ticket_data' => $ticket_data]);
		}
		else
		{
			return $this->render('ticket', ['model' => $model, 'timetable' => $timetable]);
		}
    }

    public function actionPassengers($id_to, $id_from, $date_start, $date_end, $id_traintype, $count, $price, $status)
    {
    	$fios = array();
    	$passports = array();
    	$birthdays = array();
    	$tickettypes = array();

    	foreach (Yii::$app->request->post('Ticket')['fio'] as $fio)
    	{
    		$fios[] = $fio;
    	}
    	foreach (Yii::$app->request->post('Ticket')['passport'] as $passport)
    	{
    		$passports[] = $passport;
    	}
    	foreach (Yii::$app->request->post('Ticket')['birthday'] as $birthday)
    	{
    		$birthdays[] = $birthday;
    	}
    	foreach (Yii::$app->request->post('Ticket')['id_tickettype'] as $tickettype)
    	{
    		$tickettypes[] = $tickettype;
    	}

    	$ticket_data = array(
	    	'fio' => $fios,
	    	'passport' => $passports,
	    	'birthday' => $birthdays,
	    	'id_to' => $id_to,
	    	'id_from' => $id_from,
	    	'date_start' => $date_start,
	    	'date_end' => $date_end,
	    	'count' => $count,
	    	'id_traintype' => $id_traintype,
	    	'price' => $price,
	    	'status' => $status,
	    	'id_tickettype' => $tickettypes,
            'phone' => Yii::$app->request->post('Ticket')['phone'],
		);

        if($status == 'Покупка')
        {
            $ticket_data['card'] = Yii::$app->request->post('Ticket')['card'];
            $ticket_data['cvc'] = Yii::$app->request->post('Ticket')['cvc'];
        }
        else if($status == 'Бронь')
        {
            $ticket_data['card'] = null;
            $ticket_data['cvc'] = null;
        }

        

		for($i = 0; $i < $count; $i++)
		{
			$ticket = new Ticket();
			$ticket->fio = $ticket_data['fio'][$i];
			$ticket->passport = $ticket_data['passport'][$i];
			$ticket->birthday = $ticket_data['birthday'][$i];
			$ticket->id_to = $ticket_data['id_to'];
			$ticket->id_from = $ticket_data['id_from'];
			$ticket->date_start = $ticket_data['date_start'];
			$ticket->date_end = $ticket_data['date_end'];
			$ticket->id_traintype = $ticket_data['id_traintype'];
			$ticket->id_tickettype = $ticket_data['id_tickettype'][$i];
			$ticket->phone = $ticket_data['phone'];
			$ticket->price = $ticket_data['price'];
            $ticket->status = $ticket_data['status'];
            $ticket->date_buy = date("Y-m-d H:i:s", strtotime("+3 hours"));
            $ticket->card = $ticket_data['card'];
            $ticket->cvc = $ticket_data['cvc'];
            if(Yii::$app->session['status'] && Yii::$app->session['id'] != 1)
            {
                $ticket->id_user = Yii::$app->session['id'];
            }
            else
            {
                $ticket->id_user = null;
            }
            $ticket->save();

            $timetable = Timetable::find()->where([
                'id_to' => $ticket_data['id_to'],
                'id_from' => $ticket_data['id_from'],
                'date_start' => $ticket_data['date_start'],
                'date_end' => $ticket_data['date_end']
            ])
            ->one();

            $timetable->count--;
            $timetable->save();		
		}

		return $this->redirect('index');
    }

    public function actionFindbook()
    {
        $ticket = Ticket::find()->where([
            'id_to' => Yii::$app->request->post('Ticket')['id_to'],
            'id_from' => Yii::$app->request->post('Ticket')['id_from'],
            'fio' => Yii::$app->request->post('Ticket')['fio'],
            'passport' => Yii::$app->request->post('Ticket')['passport'],
            'id_traintype' => Yii::$app->request->post('Ticket')['id_traintype'],
            'status' => 'Бронь',
        ])
        ->andWhere(['like', 'date_start', Yii::$app->request->post('Ticket')['date_start']])
        ->one();
        if(isset($ticket))
        {
            $ticket_data = array(
                'fio' => $ticket->fio,
                'passport' => $ticket->passport,
                'birthday' => $ticket->birthday,
                'id_to' => $ticket->id_to,
                'id_from' => $ticket->id_from,
                'date_start' => $ticket->date_start,
                'date_end' => $ticket->date_end,
                'id_traintype' => $ticket->id_traintype,
                'price' => $ticket->price,
                'id_tickettype' => $ticket->id_tickettype,
                'phone' => $ticket->phone,
            );

            return $this->redirect('payment?id_to='.$ticket_data['id_to'].
            '&id_from='.$ticket_data['id_from'].
            '&date_start='.$ticket_data['date_start'].
            '&date_end='.$ticket_data['date_end'].
            '&id_traintype='.$ticket_data['id_traintype'].
            '&fio='.$ticket_data['fio'].
            '&birthday='.$ticket_data['birthday'].
            '&passport='.$ticket_data['passport'].
            '&id_tickettype='.$ticket_data['id_tickettype'].
            '&phone='.$ticket_data['phone'].
            '&price='.$ticket_data['price']);
        }
        else
        {
            return $this->redirect('index');
        }
    }

    public function actionPayment($id_to, $id_from, $date_start, $date_end, $id_traintype, $price, $passport, $fio, $id_tickettype, $birthday, $phone)
    {
        $model = new Ticket();

        $ticket_data = array(
            'fio' => $fio,
            'passport' => $passport,
            'birthday' => $birthday,
            'id_to' => $id_to,
            'id_from' => $id_from,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'id_traintype' => $id_traintype,
            'price' => $price,
            'id_tickettype' => $id_tickettype,
            'phone' => $phone,
        );

        if($model->load(Yii::$app->request->post()))
        {
            $ticket = Ticket::find()->where([
                'id_to' => $id_to,
                'id_from' => $id_from,
                'fio' => $fio,
                'passport' => $passport,
                'birthday' => $birthday,
                'date_start' => $date_start,
                'date_end' => $date_end,
                'id_traintype' => $id_traintype,
                'id_tickettype' => $id_tickettype,
                'phone' => $phone,
                'price' => $price,
                'status' => 'Бронь',
            ])
            ->one();
            
            $ticket->status = 'Покупка';
            $ticket->save();
            $ticket->card = Yii::$app->request->post('Ticket')['card'];
            $ticket->save();
            $ticket->cvc = Yii::$app->request->post('Ticket')['cvc'];
            $ticket->save();
            $ticket->date_buy = date("Y-m-d H:i:s", strtotime("+3 hours"));
            $ticket->save();
            $ticket->id_user = Yii::$app->session['id'];
            $ticket->save();

            return $this->redirect('index');
        }
        else
        {
            return $this->render('payment', ['model' => $model, 'ticket_data' => $ticket_data]);
        }
    }

    public function actionTickets()
    {
    	if(Yii::$app->session['id'] == 1)
    	{
			$model = Ticket::find()->with(['traintype', 'tickettype'])->all();
	    	$stations = Station::find()->all();

	    	return $this->render('tickets', ['model' => $model, 'stations' => $stations]);
		}
    	else
    	{
    		return $this->redirect('index');
    	}
    	
    }

    public function actionConfirm_ticket($id, $status)
    {
    	$model = Ticket::findOne($id);
		$model->status = $status;

        if($status == 'Отменено')
        {
            $timetable = Timetable::find()->where([
                'id_to' => $model->id_to,
                'id_from' => $model->id_from,
                'date_start' => $model->date_start,
                'date_end' => $model->date_end
            ])
            ->one();

            $timetable->count++;
            $timetable->save();

            $model->delete();
        }

		$model->save();

    	return $this->redirect('tickets');
    }

    //TICKET_END
}