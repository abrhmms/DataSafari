<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "familia".
 *
 * @property int $id_familia
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $id_orden
 *
 * @property Genero[] $generos
 * @property Orden $orden
 */
class Familia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'familia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_orden'], 'required'],
            [['id_orden'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 100],
            [['id_orden'], 'exist', 'skipOnError' => true, 'targetClass' => Orden::class, 'targetAttribute' => ['id_orden' => 'id_orden']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_familia' => 'Id Familia',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id_orden' => 'Id Orden',
        ];
    }

    /**
     * Gets query for [[Generos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Genero::class, ['id_familia' => 'id_familia']);
    }

    /**
     * Gets query for [[Orden]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrden()
    {
        return $this->hasOne(Orden::class, ['id_orden' => 'id_orden']);
    }
}
