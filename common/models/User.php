<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property int $status
 * @property string $rol
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $password; // Campo virtual para la contraseña en formularios

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'rol'], 'required'],
            [['password'], 'required', 'on' => 'create'], // Solo obligatorio en creación
            [['password'], 'string', 'min' => 6],
            [['status'], 'integer'],
            [['rol'], 'string'],
            [['username', 'email', 'password_hash'], 'string', 'max' => 255],
            [['username', 'email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Contraseña', // Muestra "Contraseña" en los formularios
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'status' => 'Status',
            'rol' => 'Rol',
        ];
    }

    /** Implementación de IdentityInterface */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // Eliminar si no usas tokens de acceso
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null; // Eliminar si no usas autenticación con auth_key
    }

    public function validateAuthKey($authKey)
    {
        return false; // No se usa auth_key, siempre devuelve falso
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Si la contraseña fue cambiada o es un nuevo registro, se hashea
            if (!empty($this->password_hash) && $this->isAttributeChanged('password_hash')) {
                $this->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
            }
            return true;
        }
        return false;
    }
}
