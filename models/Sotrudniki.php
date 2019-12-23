<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;



class Sotrudniki extends ActiveRecord
{
 
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [           
            [['id_post'], 'integer'],
            
            [['fio'], 'string', 'max' => 100],
     
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'password' => 'Пароль',
            'fio' => 'ФИО',
            'email' => 'Почта',
            'image' => 'Картинка',
            'id_post' => 'Должность',
        ];
    }
     public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }
}