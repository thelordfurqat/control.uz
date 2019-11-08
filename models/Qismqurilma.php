<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qismqurilma".
 *
 * @property int $id
 * @property string $name
 * @property string $more
 * @property string $type
 * @property int $qurilma_id
 *
 * @property Qismmodel[] $qismmodels
 * @property Qurilma $qurilma
 */
class Qismqurilma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qismqurilma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'qurilma_id'], 'required'],
            [['more'], 'string'],
            [['qurilma_id'], 'integer'],
            [['name', 'type'], 'string', 'max' => 50],
            [['qurilma_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qurilma::className(), 'targetAttribute' => ['qurilma_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Qism',
            'more' => 'Batafsil',
            'type' => 'Kiritish turi',
            'qurilma_id' => 'Qurilma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQismmodels()
    {
        return $this->hasMany(Qismmodel::className(), ['qism_qurilma_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQurilma()
    {
        return $this->hasOne(Qurilma::className(), ['id' => 'qurilma_id']);
    }
}
