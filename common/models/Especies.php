<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "especies".
 *
 * @property int $id_especies
 * @property string $nombre_cientifico
 * @property string $nombre_comun
 * @property string $longevidad
 * @property string $semaforo_riesgo
 * @property string $distribucion
 * @property string $imagen_ilustrativa
 * @property int $id_genero
 *
 * @property Animal[] $animals
 * @property Genero $genero
 * @property HorariosAlimentacion[] $horariosAlimentacions
 */
class Especies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'especies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_cientifico', 'nombre_comun', 'longevidad', 'semaforo_riesgo', 'distribucion', 'id_genero'], 'required'],
            [['id_genero'], 'integer'],
            [['nombre_cientifico', 'nombre_comun'], 'string', 'max' => 150],
            [['longevidad'], 'string', 'max' => 45],
            [['semaforo_riesgo', 'distribucion'], 'string', 'max' => 100],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::class, 'targetAttribute' => ['id_genero' => 'id_genero']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_especies' => 'Id Especies',
            'nombre_cientifico' => 'Nombre Cientifico',
            'nombre_comun' => 'Nombre Comun',
            'longevidad' => 'Longevidad',
            'semaforo_riesgo' => 'Semaforo Riesgo',
            'distribucion' => 'Distribucion',
            'id_genero' => 'Id Genero',
        ];
    }

    /**
     * Gets query for [[Animals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::class, ['id_especies' => 'id_especies']);
    }

    /**
     * Gets query for [[Genero]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Genero::class, ['id_genero' => 'id_genero']);
    }

    /**
     * Gets query for [[HorariosAlimentacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorariosAlimentacions()
    {
        return $this->hasMany(HorariosAlimentacion::class, ['id_especies' => 'id_especies']);
    }
}
