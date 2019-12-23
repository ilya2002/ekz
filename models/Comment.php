<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $id_tasks
 * @property string $text
 *
 * @property TaskHirer $tasks
 * @property File[] $files
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tasks', 'text'], 'required'],
            [['id_tasks'], 'integer'],
            [['text'], 'string'],
             [['otvet'], 'string'],
            [['id_tasks'], 'exist', 'skipOnError' => true, 'targetClass' => TaskHirer::className(), 'targetAttribute' => ['id_tasks' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tasks' => 'Id Tasks',
            'text' => 'Text',
            'otvet' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasOne(TaskHirer::className(), ['id' => 'id_tasks']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['id_comment' => 'id']);
    }
}
