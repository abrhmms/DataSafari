<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Animal;

/**
 * AnimalSearch represents the model behind the search form of `common\models\Animal`.
 */
class AnimalSearch extends Animal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_animal', 'edad', 'id_especies', 'id_habitat'], 'integer'],
            [['nombre', 'imagen_ilustrativa'], 'safe'],
            [['peso'], 'number'],
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
        $query = Animal::find();
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    
        $this->load($params);
    
        if (!$this->validate()) {
            return $dataProvider;
        }
    
        // Si se ingresó un nombre, filtrar por coincidencias parciales
        if (!empty($this->nombre)) {
            $query->andFilterWhere(['like', 'nombre', $this->nombre]);
        }
    
        return $dataProvider;
    }
    
}
