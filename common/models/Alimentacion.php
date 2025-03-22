<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alimentacion".
 *
 * @property int $id_alimentacion
 * @property string $nombre_alimento
 * @property float $cantidad
 * @property string $unidad_medida
 * @property string $frecuencia
 * @property int $id_animal
 *
 * @property Animal $animal
 * @property HorariosAlimentacion[] $horariosAlimentacions
 */
class Alimentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alimentacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_alimento', 'cantidad', 'unidad_medida', 'frecuencia', 'id_animal'], 'required'],
            [['cantidad'], 'number'],
            [['id_animal'], 'integer'],
            [['nombre_alimento'], 'string', 'max' => 85],
            [['unidad_medida', 'frecuencia'], 'string', 'max' => 45],
            [['nombre_alimento'], 'unique'],
            [['id_animal'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['id_animal' => 'id_animal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alimentacion' => 'Id Alimentacion',
            'nombre_alimento' => 'Nombre Alimento',
            'cantidad' => 'Cantidad',
            'unidad_medida' => 'Unidad Medida',
            'frecuencia' => 'Frecuencia',
            'id_animal' => 'Id Animal',
        ];
    }

    /**
     * Gets query for [[Animal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimal()
    {
        return $this->hasOne(Animal::class, ['id_animal' => 'id_animal']);
    }

    /**
     * Gets query for [[HorariosAlimentacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorariosAlimentacions()
    {
        return $this->hasMany(HorariosAlimentacion::class, ['id_alimentacion' => 'id_alimentacion']);
    }
}
