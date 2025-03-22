<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Salud;

/**
 * SaludSearch represents the model behind the search form of `common\models\Salud`.
 */
class SaludSearch extends Salud
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registro', 'id_animal'], 'integer'],
            [['tratamiento', 'fecha_revision', 'proxima_revision', 'observaciones', 'estado_salud'], 'safe'],
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
        $query = Salud::find();

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
            'id_registro' => $this->id_registro,
            'fecha_revision' => $this->fecha_revision,
            'proxima_revision' => $this->proxima_revision,
            'id_animal' => $this->id_animal,
        ]);

        $query->andFilterWhere(['like', 'tratamiento', $this->tratamiento])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'estado_salud', $this->estado_salud]);

        return $dataProvider;
    }
}
