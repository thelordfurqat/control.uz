<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Qismmodel;

/**
 * QismmodelSearch represents the model behind the search form of `app\models\Qismmodel`.
 */
class QismmodelSearch extends Qismmodel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'modell_id', 'qism_qurilma_id'], 'integer'],
            [['name', 'more'], 'safe'],
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
        $query = Qismmodel::find();

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
            'qism_qurilma_id' => $this->qism_qurilma_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'more', $this->more]);

        return $dataProvider;
    }
}
