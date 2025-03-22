<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HorariosAlimentacion;

/**
 * HorariosSearch represents the model behind the search form of `common\models\HorariosAlimentacion`.
 */
class HorariosSearch extends HorariosAlimentacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_horarios_alimentacion', 'id_alimentacion', 'id_especies'], 'integer'],
            [['hora', 'fecha', 'tipo_comida'], 'safe'],
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
        $query = HorariosAlimentacion::find();

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
            'id_horarios_alimentacion' => $this->id_horarios_alimentacion,
            'hora' => $this->hora,
            'fecha' => $this->fecha,
            'id_alimentacion' => $this->id_alimentacion,
            'id_especies' => $this->id_especies,
        ]);

        $query->andFilterWhere(['like', 'tipo_comida', $this->tipo_comida]);

        return $dataProvider;
    }
}
