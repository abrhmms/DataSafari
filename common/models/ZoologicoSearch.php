<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Zoologico;

/**
 * ZoologicoSearch represents the model behind the search form of `common\models\Zoologico`.
 */
class ZoologicoSearch extends Zoologico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_zoologico'], 'integer'],
            [['nombre_zoologico', 'ubicacion', 'ciudad', 'pais', 'telefono', 'horario_apertura', 'horario_cierre', 'imagen_ilustrativa'], 'safe'],
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
        $query = Zoologico::find();

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
            'id_zoologico' => $this->id_zoologico,
            'horario_apertura' => $this->horario_apertura,
            'horario_cierre' => $this->horario_cierre,
        ]);

        $query->andFilterWhere(['like', 'nombre_zoologico', $this->nombre_zoologico])
            ->andFilterWhere(['like', 'ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'imagen_ilustrativa', $this->imagen_ilustrativa]);

        return $dataProvider;
    }
}
