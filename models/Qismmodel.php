<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qismmodel".
 *
 * @property int $id
 * @property string $name
 * @property string $more
 * @property int $modell_id
 * @property int $qism_qurilma_id
 *
 * @property Modell $modell
 * @property Qismqurilma $qismQurilma
 */
class Qismmodel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qismmodel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'modell_id', 'qism_qurilma_id'], 'required'],
            [['more'], 'string'],
            [['modell_id', 'qism_qurilma_id'], 'integer'],
            [['name'], 'string' , 'max' => 50],
            [['modell_id'], 'exist', 'skipOnError' => true, 'targetClass' => Modell::className(), 'targetAttribute' => ['modell_id' => 'id']],
            [['qism_qurilma_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qismqurilma::className(), 'targetAttribute' => ['qism_qurilma_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Qism modeli',
            'more' => 'Batafsil',
            'modell_id' => 'Model',
            'qism_qurilma_id' => 'Qism',
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
    public function getQismQurilma()
    {
        return $this->hasOne(Qismqurilma::className(), ['id' => 'qism_qurilma_id']);
    }
}
