<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "habitat".
 *
 * @property int $id_habitat
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $tipo
 * @property string $ubicacion
 * @property string|null $imagen_ilustrativa
 * @property string $fecha_registro
 *
 * @property Animal[] $animals
 */
class Habitat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'habitat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo', 'ubicacion'], 'required'],
            [['descripcion', 'imagen_ilustrativa'], 'string'],
            [['fecha_registro'], 'safe'],
            [['nombre', 'ubicacion'], 'string', 'max' => 100],
            [['tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_habitat' => 'Id Habitat',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'tipo' => 'Tipo',
            'ubicacion' => 'Ubicacion',
            'imagen_ilustrativa' => 'Imagen Ilustrativa',
            'fecha_registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Animals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::class, ['id_habitat' => 'id_habitat']);
    }
}
