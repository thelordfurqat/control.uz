<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modell".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $more
 * @property int $qurilma_id
 *
 * @property Jihoz[] $jihozs
 * @property Qurilma $qurilma
 * @property Qismmodel[] $qismmodels
 */
class Modell extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modell';
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
            [['name'], 'string', 'max' => 50],
            [['image'], 'file','extensions'=>'png, jpg, bmp, ico'],
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
            'name' => 'Model',
            'image' => 'Rasm',
            'more' => 'Batafsil',
            'qurilma_id' => 'Qurilma turi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJihozs()
    {
        return $this->hasMany(Jihoz::className(), ['modell_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQurilma()
    {
        return $this->hasOne(Qurilma::className(), ['id' => 'qurilma_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQismmodels()
    {
        return $this->hasMany(Qismmodel::className(), ['modell_id' => 'id']);
    }
}
