<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property int $id_comment
 * @property string $file
 *
 * @property Comment $comment
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_comment', 'file'], 'required'],
            [['id_comment'], 'integer'],
             [['file'], 'file', 'extensions' => 'png, jpg, docx, rar, zip', 
                    'skipOnEmpty' => false],
            [['id_comment'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['id_comment' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_comment' => 'Id Comment',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'id_comment']);

    }
    public function getTasks()
{
    return $this->getAssociatedProducts()->select('id')->column();
}
}
