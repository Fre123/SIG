<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Proyecto;

/**
 * ProyectoSearch represents the model behind the search form about `frontend\models\Proyecto`.
 */
class ProyectoSearch extends Proyecto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PROYECTO'], 'integer'],
            [['NOMBRE_PROYECTO', 'ESTADO_CUMPLIMIENTO_PROYECTO', 'FECHA_INICIO_PROYECTO', 'FECHA_FIN_PROYECTO'], 'safe'],
            [['PORCENTAJE_EJECUCION_PROYECTO'], 'number'],
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
        $query = Proyecto::find();

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
            'FECHA_INICIO_PROYECTO' => $this->FECHA_INICIO_PROYECTO,
            'FECHA_FIN_PROYECTO' => $this->FECHA_FIN_PROYECTO,
            'PORCENTAJE_EJECUCION_PROYECTO' => $this->PORCENTAJE_EJECUCION_PROYECTO,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_PROYECTO', $this->NOMBRE_PROYECTO])
            ->andFilterWhere(['like', 'ESTADO_CUMPLIMIENTO_PROYECTO', $this->ESTADO_CUMPLIMIENTO_PROYECTO]);

        return $dataProvider;
    }
}
