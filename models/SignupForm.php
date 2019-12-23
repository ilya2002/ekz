<?php

namespace app\models;
use yii;
use yii\base\Model;

class SignupForm extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username','password'], 'required', 'message' => 'Заполните это поле'],
        ];}
    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }
     public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }
}