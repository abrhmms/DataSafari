<?php

namespace common\models;

use Yii;

//Imagenes
use yii\web\UploadedFile;


/**
 * This is the model class for table "animal".
 *
 * @property int $id_animal
 * @property string $nombre
 * @property int $edad
 * @property float $peso
 * @property string $imagen_ilustrativa
 * @property int $id_especies
 * @property int $id_habitat
 *
 * @property Alimentacion[] $alimentacions
 * @property Especies $especies
 * @property Habitat $habitat
 * @property Reproduccion[] $reproduccions
 * @property Salud[] $saluds
 * @property Traslados[] $traslados
 * @property int $punto_id
 * @property PuntosMapa $puntoMapa
 * 
 */


class Animal extends \yii\db\ActiveRecord
{
    public $id_filo;
    public $id_clase;
    public $id_orden;
    public $id_familia;
    public $id_genero;

    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    public static function getAllAnimales()
    {
        return self::find()->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'edad', 'peso', 'imagen_ilustrativa', 'id_especies', 'id_habitat'], 'required'],
            [['edad', 'id_especies', 'id_habitat'], 'integer'],
            [['peso'], 'number'],
            //[['imagen_ilustrativa'], 'string'],
            [['nombre'], 'string', 'max' => 45],
            [['id_especies'], 'exist', 'skipOnError' => true, 'targetClass' => Especies::class, 'targetAttribute' => ['id_especies' => 'id_especies']],
            [['id_habitat'], 'exist', 'skipOnError' => true, 'targetClass' => Habitat::class, 'targetAttribute' => ['id_habitat' => 'id_habitat']],
            [['id_filo', 'id_clase', 'id_orden', 'id_familia', 'id_genero', 'id_especies', 'id_habitat'], 'integer'],
            [['imagen_ilustrativa'], 'file', 'extensions' => 'png, jpg, jpeg'], // Permitir solo imágenes (máx. 1MB)
            [['punto_id'], 'integer'],
            [['punto_id'], 'exist', 'skipOnError' => true, 'targetClass' => PuntosMapa::class, 'targetAttribute' => ['punto_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_animal' => 'Id Animal',
            'nombre' => 'Nombre',
            'edad' => 'Edad',
            'peso' => 'Peso',
            //'imagen_ilustrativa' => 'Imagen Ilustrativa',
            'id_especies' => 'Id Especies',
            'id_habitat' => 'Id Habitat',

            'punto_id' => 'Punto de Mapa',

        ];
    }

    /**
     * Gets query for [[Alimentacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlimentacions()
    {
        return $this->hasMany(Alimentacion::class, ['id_animal' => 'id_animal']);
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

    /** TAXONOMIA GET */

    public function getFilo()
    {
        return $this->hasOne(Filo::class, ['id_filo' => 'id_filo'])
                    ->via('clase');
    }
    
    public function getClase()
    {
        return $this->hasOne(Clase::class, ['id_clase' => 'id_clase'])
                    ->via('orden');
    }
    
    public function getOrden()
    {
        return $this->hasOne(Orden::class, ['id_orden' => 'id_orden'])
                    ->via('familia');
    }
    
    public function getFamilia()
    {
        return $this->hasOne(Familia::class, ['id_familia' => 'id_familia'])
                    ->via('genero');
    }
    
    public function getGenero()
    {
        return $this->hasOne(Genero::class, ['id_genero' => 'id_genero'])
                    ->via('especies');
    }
    


    /**
     * Gets query for [[Habitat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHabitat()
    {
        return $this->hasOne(Habitat::class, ['id_habitat' => 'id_habitat']);
    }

    /**
     * Gets query for [[Reproduccions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReproduccions()
    {
        return $this->hasMany(Reproduccion::class, ['id_animal_madre' => 'id_animal']);
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_animal' => 'id_animal']);
    }

    /**
     * Gets query for [[Traslados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraslados()
    {
        return $this->hasMany(Traslados::class, ['id_animal' => 'id_animal']);
    }

    public function getPuntoMapa()
{
    return $this->hasOne(PuntosMapa::class, ['id' => 'punto_id']);
}


    public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            $this->imagen_ilustrativa = 'uploads/' . $this->file->baseName . '.' . $this->file->extension;
            return true;
        } else {
            return false;
        }
    }

}
