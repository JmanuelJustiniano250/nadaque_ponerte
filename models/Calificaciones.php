<?php

namespace app\models;

/**
 * This is the model class for table "calificaciones".
 *
 * @property int $idcalificacion
 * @property int $idusuario
 * @property int $idvendedor
 * @property int $puntaje
 * @property int $estado
 * @property string $mensaje
 * @property string $fecha_creacion
 */
class Calificaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calificaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'idvendedor', 'puntaje', 'estado'], 'integer'],
            [['mensaje'], 'string'],
            [['fecha_creacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcalificacion' => 'Idcalificacion',
            'idusuario' => 'Idusuario',
            'idvendedor' => 'Idvendedor',
            'puntaje' => 'Puntaje',
            'mensaje' => 'Mensaje',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }

    public function getVendedor()
    {
        return $this->hasOne(Usuarios::className(), ['idvendedor' => 'idusuario']);
    }

    static public function haveNew($usuario = null)
    {
        $mensaje = Calificaciones::find();
        $mensaje = $mensaje->andWhere(['estado' => 0]);
        if (!empty($usuario)) {
            $mensaje = $mensaje->andWhere(['idvendedor' => $usuario]);
        }

        return ($mensaje->count() > 0);
    }
}
