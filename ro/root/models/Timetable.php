<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Timetable extends ActiveRecord
{
	public function rules()
	{
		return [
			[['id_train', 'id_from', 'id_to', 'date_start', 'date_end', 'count'], 'required', 'message' => 'Заполните это поле'],
		];
	}

	public function attributeLabels()
	{
		return [
			'id_train' => 'Поезд',
			'id_from' => 'Откуда',
			'id_to' => 'Куда', 
			'date_start' => 'Дата и время отбытия',
			'date_end' => 'Дата и время прибытия',
			'count' => 'Количество билетов',
		];
	}

	public function getTrain()
	{
		return $this->hasOne(Train::className(), ['id' => 'id_train']);
	}

	public function getStation()
	{
		return $this->hasOne(Station::className(), ['id' => 'id_from', 'id' => 'id_to']);
	}
}
?>