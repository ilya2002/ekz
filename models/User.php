<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $fio
 * @property string $email
 * @property int $id_post
 * @property int $id_roles
 *
 * @property Chat[] $chats
 * @property TaskHirer[] $taskHirers
 * @property Tasks[] $tasks
 * @property Roles $roles
 * @property Post $post
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fio', 'id_post', 'id_roles'], 'required'],
            [['password', 'email'], 'string'],
            [['id_post', 'id_roles'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['fio'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['id_roles'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['id_roles' => 'id']],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'password' => 'Пароль',
            'fio' => 'ФИО',
            'email' => 'Почта',
            'id_post' => 'Должность',
            'id_roles' => 'Роль',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['id_name' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskHirers()
    {
        return $this->hasMany(TaskHirer::className(), ['id_hirer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['emloyment' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasOne(Roles::className(), ['id' => 'id_roles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }
}
