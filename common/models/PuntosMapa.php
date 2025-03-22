<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "puntos_mapa".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property float|null $x
 * @property float|null $y
 */
class PuntosMapa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'puntos_mapa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['x', 'y'], 'number'],
            [['nombre', 'imagen'], 'string', 'max' => 255],
            [['tiene_animales'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'x' => 'X',
            'y' => 'Y',
            'imagen' => 'Imagen',
            'tiene_animales' => 'Tiene Animales',
        ];
    }

    public function getAnimales()
    {
        return $this->hasMany(Animal::class, ['punto_id' => 'id']);
    }
}
