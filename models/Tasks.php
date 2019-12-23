<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $process
 * @property int $emloyment
 * @property string $start
 * @property string $end
 *
 * @property TaskHirer[] $taskHirers
 * @property User $emloyment0
 */
class Tasks extends \yii\db\ActiveRecord
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
            [['name', 'description', 'start', 'end'], 'required'],
            [['emloyment'], 'integer'],
            [['start', 'end'], 'safe'],
            [['process', 'name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['emloyment'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['emloyment' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'process' => 'Статус',
            'emloyment' => 'Сотрудник',
            'start' => 'Начало',
            'end' =>'Сдача',
        ];
    }


    public function getEmloyment0()
    {
        return $this->hasOne(User::className(), ['id' => 'emloyment']);
    }
}
