<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qurilma".
 *
 * @property int $id
 * @property string $name
 * @property string $more
 *
 * @property Modell[] $modells
 * @property Qismqurilma[] $qismqurilmas
 */
class Qurilma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qurilma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', ], 'required'],
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
    public function getModells()
    {
        return $this->hasMany(Modell::className(), ['qurilma_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQismqurilmas()
    {
        return $this->hasMany(Qismqurilma::className(), ['qurilma_id' => 'id']);
    }
}
