<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filo".
 *
 * @property int $id_filo
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Clase[] $clases
 */
class Filo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_filo' => 'Id Filo',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Clases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clase::class, ['id_filo' => 'id_filo']);
    }
}
