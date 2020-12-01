<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $text
 * @property string $author
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 */
class Messages extends ActiveRecord
{

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['text', 'string'],
            ['text', 'required'],

            ['author', 'string', 'max'=> 255],
            ['author', 'required'],
            
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Сообщение',
            'author' => 'Автор',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    public function hide($id) 
    {   
        $m = static::findOne(['id'=> $id]);
        $m->status = self::STATUS_INACTIVE;
        return $m->save();
    }

    public function show($id)
    {
        $m = static::findOne(['id'=> $id]);
        $m->status = self::STATUS_ACTIVE;
        return $m->save();
    }
}
