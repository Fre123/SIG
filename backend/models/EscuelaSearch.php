<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Escuela;

/**
 * EscuelaSearch represents the model behind the search form about `backend\models\Escuela`.
 */
class EscuelaSearch extends Escuela
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESCUELA'], 'integer'],
            [['NOMBRE_ESCUELA'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Escuela::find();

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
            'ID_ESCUELA' => $this->ID_ESCUELA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_ESCUELA', $this->NOMBRE_ESCUELA]);

        return $dataProvider;
    }
}
