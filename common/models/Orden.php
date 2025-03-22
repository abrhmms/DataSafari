<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orden".
 *
 * @property int $id_orden
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $id_clase
 *
 * @property Clase $clase
 * @property Familia[] $familias
 */
class Orden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_clase'], 'required'],
            [['id_clase'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 100],
            [['id_clase'], 'exist', 'skipOnError' => true, 'targetClass' => Clase::class, 'targetAttribute' => ['id_clase' => 'id_clase']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_orden' => 'Id Orden',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id_clase' => 'Id Clase',
        ];
    }

    /**
     * Gets query for [[Clase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClase()
    {
        return $this->hasOne(Clase::class, ['id_clase' => 'id_clase']);
    }

    /**
     * Gets query for [[Familias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilias()
    {
        return $this->hasMany(Familia::class, ['id_orden' => 'id_orden']);
    }
}
