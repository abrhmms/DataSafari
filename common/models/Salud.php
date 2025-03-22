<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salud".
 *
 * @property int $id_registro
 * @property string $tratamiento
 * @property string $fecha_revision
 * @property string $proxima_revision
 * @property int $id_animal
 * @property string|null $observaciones
 * @property string|null $estado_salud
 *
 * @property Animal $animal
 */
class Salud extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tratamiento', 'fecha_revision', 'proxima_revision', 'id_animal'], 'required'],
            [['tratamiento', 'observaciones', 'estado_salud'], 'string'],
            [['fecha_revision', 'proxima_revision'], 'safe'],
            [['id_animal'], 'integer'],
            [['id_animal'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['id_animal' => 'id_animal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_registro' => 'Id Registro',
            'tratamiento' => 'Tratamiento',
            'fecha_revision' => 'Fecha Revision',
            'proxima_revision' => 'Proxima Revision',
            'id_animal' => 'Id Animal',
            'observaciones' => 'Observaciones',
            'estado_salud' => 'Estado Salud',
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
}
