<?php

namespace appcontrollers;

use appmodelsMessage;
use Yii;
use yiifiltersAccessControl;
use yiihelpersVarDumper;
use yiiwebController;

class ChatController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ]
        ];
    }

    public function actionIndex($id)
    {
        $currentUserId = Yii::$app->user->identity->getId();
        $messagesQuery = Message::findMessages($currentUserId, $id);
        $message = new Message([
            'from' => $currentUserId,
            'to' => $id
        ]);
        if ($message->load(Yii::$app->request->post()) && $message->validate()) {
            $message->save();
            $message = new Message([
                'from' => $currentUserId
            ]);
            if (Yii::$app->request->isPjax) {
                return $this->renderAjax('_chat', compact('messagesQuery', 'message'));
            }
        }
        if (Yii::$app->request->isPjax) {
            return $this->renderAjax('_list', compact('messagesQuery', 'message'));
        }

        return $this->render('chat', compact('messagesQuery', 'message'));
    }
}
https://www.pvsm.ru/ajax/191782
