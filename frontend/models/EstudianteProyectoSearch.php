<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EstudianteProyecto;

/**
 * EstudianteProyectoSearch represents the model behind the search form about `frontend\models\EstudianteProyecto`.
 */
class EstudianteProyectoSearch extends EstudianteProyecto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PROYECTO', 'ID_ESTUDIANTE', 'HORAS'], 'integer'],
            [['FECHA_REGISTRO'], 'safe'],
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
        $query = EstudianteProyecto::find();

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
            'ID_PROYECTO' => $this->ID_PROYECTO,
            'ID_ESTUDIANTE' => $this->ID_ESTUDIANTE,
            'FECHA_REGISTRO' => $this->FECHA_REGISTRO,
            'HORAS' => $this->HORAS,
        ]);

        return $dataProvider;
    }
}
