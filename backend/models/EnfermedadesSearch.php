<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Enfermedades;

/**
 * EnfermedadesSearch represents the model behind the search form about `backend\models\Enfermedades`.
 */
class EnfermedadesSearch extends Enfermedades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ENFERMEDAD'], 'integer'],
            [['NOMBRE_ENFERMEDAD'], 'safe'],
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
        $query = Enfermedades::find();

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
            'ID_ENFERMEDAD' => $this->ID_ENFERMEDAD,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_ENFERMEDAD', $this->NOMBRE_ENFERMEDAD]);

        return $dataProvider;
    }
}
