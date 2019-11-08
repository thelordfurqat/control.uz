<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string $name
 * @property string $more
 *
 * @property Jihoz[] $jihozs
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['more'], 'string'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'more' => 'Batafsil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJihozs()
    {
        return $this->hasMany(Jihoz::className(), ['room_id' => 'id']);
    }
}
