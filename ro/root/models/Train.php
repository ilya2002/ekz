<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Train extends ActiveRecord
{
	public function rules()
	{
		return[
			[['name', 'info'], 'required', 'message' => 'Заполните это поле'],
			['image', 'file'],
		];
	}

	public function attributeLabels()
	{
		return [
			'name' => 'Название',
			'info' => 'Информация',
			'image' => 'Изображение',
		];
	}
}
?>