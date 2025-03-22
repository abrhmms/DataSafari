<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zoologico".
 *
 * @property int $id_zoologico
 * @property string $nombre_zoologico
 * @property string $ubicacion
 * @property string $ciudad
 * @property string $pais
 * @property string $telefono
 * @property string $horario_apertura
 * @property string $horario_cierre
 * @property string $imagen_ilustrativa
 *
 * @property Habitat[] $habitats
 */
class Zoologico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zoologico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_zoologico', 'ubicacion', 'ciudad', 'pais', 'telefono', 'horario_apertura', 'horario_cierre', 'imagen_ilustrativa'], 'required'],
            [['ubicacion', 'imagen_ilustrativa'], 'string'],
            [['horario_apertura', 'horario_cierre'], 'safe'],
            [['nombre_zoologico', 'ciudad', 'pais'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_zoologico' => 'Id Zoologico',
            'nombre_zoologico' => 'Nombre Zoologico',
            'ubicacion' => 'Ubicacion',
            'ciudad' => 'Ciudad',
            'pais' => 'Pais',
            'telefono' => 'Telefono',
            'horario_apertura' => 'Horario Apertura',
            'horario_cierre' => 'Horario Cierre',
            'imagen_ilustrativa' => 'Imagen Ilustrativa',
        ];
    }

    /**
     * Gets query for [[Habitats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHabitats()
    {
        return $this->hasMany(Habitat::class, ['id_zoologico' => 'id_zoologico']);
    }
}
