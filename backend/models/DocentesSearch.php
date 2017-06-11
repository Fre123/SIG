<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Docentes;

/**
 * DocentesSearch represents the model behind the search form about `backend\models\Docentes`.
 */
class DocentesSearch extends Docentes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DOCENTES', 'ID_ESCUELA'], 'integer'],
            [['NOMBRE_DOCENTES', 'CEDULA_DOCENTE', 'SEXO'], 'safe'],
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
        $query = Docentes::find();

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
            'ID_DOCENTES' => $this->ID_DOCENTES,
            'ID_ESCUELA' => $this->ID_ESCUELA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_DOCENTES', $this->NOMBRE_DOCENTES])
            ->andFilterWhere(['like', 'CEDULA_DOCENTE', $this->CEDULA_DOCENTE])
            ->andFilterWhere(['like', 'SEXO', $this->SEXO]);

        return $dataProvider;
    }
}
