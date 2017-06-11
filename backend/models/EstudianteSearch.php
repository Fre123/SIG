<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Estudiante;

/**
 * EstudianteSearch represents the model behind the search form about `backend\models\Estudiante`.
 */
class EstudianteSearch extends Estudiante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTUDIANTE', 'ID_ESCUELA'], 'integer'],
            [['NOMBRE_ESTUDIANTE', 'CEDULA_ESTUDIANTE', 'MATRICULA_ESTUDIANTE', 'SEXO'], 'safe'],
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
        $query = Estudiante::find();

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
            'ID_ESTUDIANTE' => $this->ID_ESTUDIANTE,
            'ID_ESCUELA' => $this->ID_ESCUELA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_ESTUDIANTE', $this->NOMBRE_ESTUDIANTE])
            ->andFilterWhere(['like', 'CEDULA_ESTUDIANTE', $this->CEDULA_ESTUDIANTE])
            ->andFilterWhere(['like', 'MATRICULA_ESTUDIANTE', $this->MATRICULA_ESTUDIANTE])
            ->andFilterWhere(['like', 'SEXO', $this->SEXO]);

        return $dataProvider;
    }
}
