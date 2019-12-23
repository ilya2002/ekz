<?php

namespace app\models;

use Yii;
class Zadachi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'process', 'emloyment', 'start', 'end'], 'required'],
            [['process', 'emloyment'], 'integer'],
            [['start', 'end'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['file'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'process' => 'Процесс',
            'emloyment' => 'Сотрудник',
            'start' => 'Дата начала',
            'end' => 'Дата сдачи',
        ];
    }
       public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'emloyment']);
    }
}
