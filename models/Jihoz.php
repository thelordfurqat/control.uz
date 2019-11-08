<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jihoz".
 *
 * @property int $id
 * @property int $modell_id
 * @property int $stuff_id
 * @property int $room_id
 * @property string $seriya
 * @property int $holati
 * @property string $more
 *
 * @property Modell $modell
 * @property Stuff $stuff
 * @property Room $room
 */
class Jihoz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jihoz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modell_id', 'stuff_id', 'room_id', 'seriya', 'holati'], 'required'],
            [['modell_id', 'stuff_id', 'room_id', 'holati'], 'integer'],
            [['more'], 'string'],
            [['seriya'], 'string', 'max' => 50],
            [['modell_id'], 'exist', 'skipOnError' => true, 'targetClass' => Modell::className(), 'targetAttribute' => ['modell_id' => 'id']],
            [['stuff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stuff::className(), 'targetAttribute' => ['stuff_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modell_id' => 'Modell',
            'stuff_id' => 'Stuff',
            'room_id' => 'Room',
            'seriya' => 'Seriya',
            'holati' => 'Holati',
            'more' => 'More',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModell()
    {
        return $this->hasOne(Modell::className(), ['id' => 'modell_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuff()
    {
        return $this->hasOne(Stuff::className(), ['id' => 'stuff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }
}
