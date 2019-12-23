<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Ticket extends ActiveRecord
{
	public function rules()
	{
		return [
			[['fio', 'passport', 'birthday', 'phone', 'id_to', 'id_from', 'date_start', 'date_end', 'price', 'id_traintype', 'id_tickettype', 'id_tickettype', 'id_traintype'], 'required', 'message' => 'Заполните это поле'],
		];
	}

	public function attributeLabels()
	{
		return [
			'id_traintype' => 'Вагон',
			'fio' => 'Ф.И.О',
			'passport' => 'Серия паспорта',
			'birthday' => 'Дата рождения',
			'phone' => 'Телефон',
			'id_tickettype' => 'Билет',
			'card' => 'Номер банковской карты',
			'cvc' => '3 цифры cvc-кода',
		];
	}

	public function getTraintype()
	{
		return $this->hasOne(Traintype::className(), ['id' => 'id_traintype']);
	}

	public function getStation()
	{
		return $this->hasOne(Station::className(), ['id' => 'id_from', 'id' => 'id_to']);
	}

	public function getTickettype()
	{
		return $this->hasOne(Tickettype::className(), ['id' => 'id_tickettype']);
	}
}
?>