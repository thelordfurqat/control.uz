<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stuff".
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property string $image
 * @property string $more
 *
 * @property Jihoz[] $jihozs
 */
class Stuff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stuff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', ], 'required'],
            [['more'], 'string'],
            [['name', 'tel'], 'string', 'max' => 50],
            [['image'],'file','extensions'=>'png, jpg, bmp, ico'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ism Familiya Sharif',
            'tel' => 'Telefon',
            'image' => 'Rasm',
            'more' => 'Batafsil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJihozs()
    {
        return $this->hasMany(Jihoz::className(), ['stuff_id' => 'id']);
    }
}
