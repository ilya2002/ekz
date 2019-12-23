<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
	public static function tableName()
	{
		return 'users';
	}

	public function rules()
	{
		return [
			[['login', 'mail', 'password', 'fio'], 'required', 'message' => 'Заполните это поле'],
			['mail', 'email'],
			['login', 'unique', 'targetClass' => User::className(), 'message' => 'Логин занят'],
			['mail', 'unique', 'targetClass' => User::className(), 'message' => 'Почта занята'],
		];
	}

	public function attributeLabels()
	{
		return [
			'login' => 'Логин',
			'password' => 'Пароль',
			'mail' => 'E-mail',
			'fio' => 'Ф.И.О',
		];
	}
}
?>