<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
	public static function tableName()
	{
		return 'comments';
	}

	public function rules()
	{
		return [
			[['text'], 'required', 'message' => 'Заполните это поле'],
		];
	}

	public function attributeLabels()
	{
		return [
			'text' => 'Сообщение',
		];
	}

	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'id_sender']);
	}
}
?>