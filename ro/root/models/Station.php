<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Station extends ActiveRecord
{
	public function rules()
	{
		return [
			[['name'], 'required', 'message' => 'Заполните это поле'],
		];
	}

	public function attributeLabels()
	{
		return[
			'name' => 'Название',
		];
	}
}
?>