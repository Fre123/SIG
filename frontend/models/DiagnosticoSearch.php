<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Diagnostico;

/**
 * DiagnosticoSearch represents the model behind the search form about `frontend\models\Diagnostico`.
 */
class DiagnosticoSearch extends Diagnostico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DIAGNOSTICO'], 'integer'],
            [['DESCRIPCION_DIAGNOSTICO'], 'safe'],
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
        $query = Diagnostico::find();

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
            'ID_DIAGNOSTICO' => $this->ID_DIAGNOSTICO,
        ]);

        $query->andFilterWhere(['like', 'DESCRIPCION_DIAGNOSTICO', $this->DESCRIPCION_DIAGNOSTICO]);

        return $dataProvider;
    }
}
