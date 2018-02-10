<?php

namespace app\models;

use yii\base\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "administrador".
 *
 * @property integer $idamin
 * @property string $fecha_registro
 * @property string $usuario
 * @property string $contrasena
 * @property integer $estado
 * @property integer $tipo
 * @property integer $authKey
 * @property integer $accessToken
 * @property integer $idusuario
 */
class Administrador extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'administrador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['estado', 'tipo', 'authKey', 'accessToken', 'idusuario'], 'integer'],
            [['usuario', 'contrasena'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idamin' => 'Idamin',
            'fecha_registro' => 'Fecha Registro',
            'usuario' => 'Usuario',
            'contrasena' => 'Contrasena',
            'estado' => 'Estado',
            'tipo' => 'Tipo',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'idusuario' => 'Idusuario',
        ];
    }

    //
    public static function findIdentity($id)
    {
        return static::findOne(['idamin' => $id, 'estado' => 1]);
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($usuario)
    {
        return static::findOne(['usuario' => $usuario]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->authKey = Security::generateRandomKey();
    }

    /**
     * Validates password
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($contrasena)
    {
        return $this->contrasena === md5($contrasena);
    }
}
