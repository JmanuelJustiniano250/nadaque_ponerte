<?php

namespace app\models;

/**
 * This is the model class for table "mensajes".
 *
 * @property int $idmensaje
 * @property int $idusuario
 * @property string $titulo
 * @property string $detalle
 * @property string $fecha_registro
 * @property int $tipo
 * @property int $estado
 * @property int $idanuncio
 */
class Mensajes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mensajes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'detalle', 'tipo', 'estado'], 'required'],
            [['idusuario', 'tipo', 'estado','idanuncio'], 'integer'],
            [['detalle'], 'string'],
            [['fecha_registro'], 'safe'],
            [['titulo'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmensaje' => 'Idmensaje',
            'idusuario' => 'Idusuario',
            'idanuncio' => 'idanuncio',
            'titulo' => 'Titulo',
            'detalle' => 'Detalle',
            'fecha_registro' => 'Fecha Registro',
            'tipo' => 'Tipo',
            'estado' => 'Estado',
        ];
    }

    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }
}
