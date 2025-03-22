<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reproduccion".
 *
 * @property int $id_reproduccion
 * @property string $fecha_nacimiento
 * @property string $estado_cria
 * @property int $numero_crias
 * @property int $id_animal_madre
 *
 * @property Animal $animalMadre
 */
class Reproduccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reproduccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento', 'estado_cria', 'numero_crias', 'id_animal_madre'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['numero_crias', 'id_animal_madre'], 'integer'],
            [['estado_cria'], 'string', 'max' => 45],
            [['id_animal_madre'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['id_animal_madre' => 'id_animal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_reproduccion' => 'Id Reproduccion',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'estado_cria' => 'Estado Cria',
            'numero_crias' => 'Numero Crias',
            'id_animal_madre' => 'Id Animal Madre',
        ];
    }

    /**
     * Gets query for [[AnimalMadre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimalMadre()
    {
        return $this->hasOne(Animal::class, ['id_animal' => 'id_animal_madre']);
    }
}
