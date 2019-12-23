<?php

namespace appmodels;

use yiidbActiveQuery;
use yiidbActiveRecord;
/**
 * @property int $id
 * @property int $from
 * @property int $to
 * @property string $text
*/
class Message extends ActiveRecord
{
    public function rules()
    {
        return [
            [['from', 'to', 'text'], 'required'],
            [['from', 'to'], 'integer'],
            ['text', 'string']
        ];
    }

    /**
     * @param int $from
     * @param int $to
     * @return ActiveQuery
     */
    public static function findMessages($from, $to)
    {
        return self::find()
            ->where(['from' => $from])
            ->orWhere(['from' => $to, 'to' => $from]);
    }
}
https://www.pvsm.ru/ajax/191782