<?php

namespace app\models;

/**
 * This is the model class for table "anunciantes".
 *
 * @property integer $idanunciante
 * @property string $fecha_registro
 * @property integer $estado
 * @property string $foto
 * @property string $alias
 * @property string $ciudad
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $descripcion
 * @property string $idusuario
 */
class Anunciantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anunciantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['estado','idusuario'], 'integer'],
            [['descripcion'], 'string'],
            [['foto', 'email'], 'string', 'max' => 250],
            [['alias', 'direccion'], 'string', 'max' => 100],
            [['ciudad'], 'string', 'max' => 50],
            [['telefono', 'celular'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idanunciante' => 'Idanunciante',
            'fecha_registro' => 'Fecha Registro',
            'estado' => 'Estado',
            'foto' => 'Foto',
            'alias' => 'Alias',
            'ciudad' => 'Ciudad',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'email' => 'Email',
            'descripcion' => 'Descripcion',
            'idusuario' => 'Usuario',
        ];
    }
    //
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(),['idusuario'=>'idusuario']);
    }
}
