<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reproduccion;

/**
 * ReproduccionSearch represents the model behind the search form of `common\models\Reproduccion`.
 */
class ReproduccionSearch extends Reproduccion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reproduccion', 'numero_crias', 'id_animal_madre'], 'integer'],
            [['fecha_nacimiento', 'estado_cria'], 'safe'],
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
        $query = Reproduccion::find();

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
            'id_reproduccion' => $this->id_reproduccion,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'numero_crias' => $this->numero_crias,
            'id_animal_madre' => $this->id_animal_madre,
        ]);

        $query->andFilterWhere(['like', 'estado_cria', $this->estado_cria]);

        return $dataProvider;
    }
}
