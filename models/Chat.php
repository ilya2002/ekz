<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Chat extends ActiveRecord
{
	public static function tableName()
	{
		return 'chat';
	}

	public function rules()
	{
		return [
			[['message'], 'required', 'message' => 'Заполните это поле'],
		];
	}

	public function attributeLabels()
	{
		return [
			'message' => 'Сообщение',
		];
	}

	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'id_name']);
	}
}
?>