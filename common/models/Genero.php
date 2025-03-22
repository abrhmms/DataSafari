<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $id_genero
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $id_familia
 *
 * @property Familia $familia
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_familia'], 'required'],
            [['id_familia'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 100],
            [['id_familia'], 'exist', 'skipOnError' => true, 'targetClass' => Familia::class, 'targetAttribute' => ['id_familia' => 'id_familia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_genero' => 'Id Genero',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id_familia' => 'Id Familia',
        ];
    }

    /**
     * Gets query for [[Familia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilia()
    {
        return $this->hasOne(Familia::class, ['id_familia' => 'id_familia']);
    }
}
