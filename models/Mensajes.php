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
 * @property int $idcliente
 * @property int $tipo
 * @property int $estado
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
            [['idusuario', 'detalle', 'idcliente', 'tipo', 'estado'], 'required'],
            [['idusuario', 'idcliente', 'tipo', 'estado'], 'integer'],
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
            'titulo' => 'Titulo',
            'detalle' => 'Detalle',
            'fecha_registro' => 'Fecha Registro',
            'idcliente' => 'Idcliente',
            'tipo' => 'Tipo',
            'estado' => 'Estado',
        ];
    }
}
