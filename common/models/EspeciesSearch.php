<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Especies;

/**
 * EspeciesSearch represents the model behind the search form of `common\models\Especies`.
 */
class EspeciesSearch extends Especies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_especies', 'id_genero'], 'integer'],
            [['nombre_cientifico', 'nombre_comun', 'longevidad', 'semaforo_riesgo', 'distribucion'], 'safe'],
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
        $query = Especies::find();

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
            'id_especies' => $this->id_especies,
            'id_genero' => $this->id_genero,
        ]);

        $query->andFilterWhere(['like', 'nombre_cientifico', $this->nombre_cientifico])
            ->andFilterWhere(['like', 'nombre_comun', $this->nombre_comun])
            ->andFilterWhere(['like', 'longevidad', $this->longevidad])
            ->andFilterWhere(['like', 'semaforo_riesgo', $this->semaforo_riesgo])
            ->andFilterWhere(['like', 'distribucion', $this->distribucion]);


        return $dataProvider;
    }
}
