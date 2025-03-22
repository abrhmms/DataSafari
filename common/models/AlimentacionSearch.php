<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Alimentacion;

/**
 * AlimentacionSearch represents the model behind the search form of `common\models\Alimentacion`.
 */
class AlimentacionSearch extends Alimentacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alimentacion', 'id_animal'], 'integer'],
            [['nombre_alimento', 'unidad_medida', 'frecuencia'], 'safe'],
            [['cantidad'], 'number'],
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
        $query = Alimentacion::find();

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
            'id_alimentacion' => $this->id_alimentacion,
            'cantidad' => $this->cantidad,
            'id_animal' => $this->id_animal,
        ]);

        $query->andFilterWhere(['like', 'nombre_alimento', $this->nombre_alimento])
            ->andFilterWhere(['like', 'unidad_medida', $this->unidad_medida])
            ->andFilterWhere(['like', 'frecuencia', $this->frecuencia]);

        return $dataProvider;
    }
}
