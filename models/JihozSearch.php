<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jihoz;

/**
 * JihozSearch represents the model behind the search form of `app\models\Jihoz`.
 */
class JihozSearch extends Jihoz
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'modell_id', 'stuff_id', 'room_id', 'holati'], 'integer'],
            [['seriya', 'more'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Jihoz::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'modell_id' => $this->modell_id,
            'stuff_id' => $this->stuff_id,
            'room_id' => $this->room_id,
            'holati' => $this->holati,
        ]);

        $query->andFilterWhere(['like', 'seriya', $this->seriya])
            ->andFilterWhere(['like', 'more', $this->more]);

        return $dataProvider;
    }
}
