<?php

namespace app\models;

/**
 * This is the model class for table "notificaciones".
 *
 * @property int $idnotificaciones
 * @property string $texto
 * @property string $fecha_modificacion
 * @property int $dia_envio
 * @property int $estado
 * @property int $tipo
 */
class Notificaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notificaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['texto'], 'string'],
            [['fecha_modificacion'], 'safe'],
            [['dia_envio', 'estado', 'tipo'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnotificaciones' => 'Idnotificaciones',
            'texto' => 'Texto',
            'fecha_modificacion' => 'Fecha Modificacion',
            'dia_envio' => 'Dia Envio',
            'estado' => 'Estado',
            'tipo' => 'Tipo',
        ];
    }
}
