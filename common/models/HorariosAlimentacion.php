<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "horarios_alimentacion".
 *
 * @property int $id_horarios_alimentacion
 * @property string $hora
 * @property string $fecha
 * @property string $tipo_comida
 * @property int $id_alimentacion
 * @property int $id_especies
 * @property int|null $alimentado
 *
 * @property Alimentacion $alimentacion
 * @property Especies $especies
 */
class HorariosAlimentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horarios_alimentacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hora', 'fecha', 'tipo_comida', 'id_alimentacion', 'id_especies', 'alimentado'], 'required'],
            [['hora', 'fecha'], 'safe'],
            [['id_alimentacion', 'id_especies', 'alimentado'], 'integer'],
            [['tipo_comida'], 'string', 'max' => 45],
            [['id_alimentacion'], 'exist', 'skipOnError' => true, 'targetClass' => Alimentacion::class, 'targetAttribute' => ['id_alimentacion' => 'id_alimentacion']],
            [['id_especies'], 'exist', 'skipOnError' => true, 'targetClass' => Especies::class, 'targetAttribute' => ['id_especies' => 'id_especies']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_horarios_alimentacion' => 'Id Horarios Alimentacion',
            'hora' => 'Hora',
            'fecha' => 'Fecha',
            'tipo_comida' => 'Tipo Comida',
            'id_alimentacion' => 'Id Alimentacion',
            'id_especies' => 'Id Especies',
            'alimentado' => 'Alimentado',
        ];
    }

    /**
     * Gets query for [[Alimentacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlimentacion()
    {
        return $this->hasOne(Alimentacion::class, ['id_alimentacion' => 'id_alimentacion']);
    }

    /**
     * Gets query for [[Especies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspecies()
    {
        return $this->hasOne(Especies::class, ['id_especies' => 'id_especies']);
    }
}
