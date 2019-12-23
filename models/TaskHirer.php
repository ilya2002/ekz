<?php

namespace app\models;

use Yii;


class TaskHirer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_hirer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_task', 'id_hirer'], 'required'],
            [['id_task', 'id_hirer'], 'integer'],
            [['id_task'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['id_task' => 'id']],
            [['id_hirer'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_hirer' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_task' => 'Id Task',
            'id_hirer' => 'Сотрудник',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_tasks' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'id_task']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_hirer']);
    }
      public function getHirer()
    {
        return $this->hasOne(User::className(), ['id' => 'id_hirer']);
    }
}
