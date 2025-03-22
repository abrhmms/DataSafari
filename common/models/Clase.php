<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clase".
 *
 * @property int $id_clase
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $id_filo
 *
 * @property Filo $filo
 * @property Orden[] $ordens
 */
class Clase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_filo'], 'required'],
            [['id_filo'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 100],
            [['id_filo'], 'exist', 'skipOnError' => true, 'targetClass' => Filo::class, 'targetAttribute' => ['id_filo' => 'id_filo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_clase' => 'Id Clase',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id_filo' => 'Id Filo',
        ];
    }

    /**
     * Gets query for [[Filo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilo()
    {
        return $this->hasOne(Filo::class, ['id_filo' => 'id_filo']);
    }

    /**
     * Gets query for [[Ordens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens()
    {
        return $this->hasMany(Orden::class, ['id_clase' => 'id_clase']);
    }
}
