<?php

namespace app\models;

/**
 * This is the model class for table "compra".
 *
 * @property int $idcompra
 * @property int $idusuario
 * @property string $fecha_registro
 * @property string $fecha_pago
 * @property int $idpaquete
 * @property string $fecha_aprovacion
 * @property double $precio
 * @property int $estado
 * @property string $nombre_factura
 * @property string $nit_factura
 * @property int $tipo_pago
 * @property string $session
 *
 * @property Paquetes $paquete
 * @property Usuarios $usuario
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'idpaquete'], 'require'],
            [['idusuario', 'idpaquete', 'tipo_pago'], 'integer'],
            [['fecha_registro', 'fecha_aprovacion', 'fecha_pago'], 'safe'],
            [['precio'], 'number'],
            [['nombre_factura', 'nit_factura'], 'string', 'max' => 50],
            [['session'], 'string', 'max' => 255],
            [['idpaquete'], 'exist', 'skipOnError' => true, 'targetClass' => Paquetes::className(), 'targetAttribute' => ['idpaquete' => 'idpaquete']],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcompra' => 'Idcompra',
            'idusuario' => 'Idusuario',
            'fecha_registro' => 'Fecha Registro',
            'fecha_pago' => 'Fecha Pago',
            'idpaquete' => 'Idpaquete',
            'fecha_aprovacion' => 'Fecha Aprovacion',
            'precio' => 'Precio',
            'estado' => 'Estado',
            'nombre_factura' => 'Nombre Factura',
            'nit_factura' => 'Nit Factura',
            'tipo_pago' => 'Tipo_Pago',
            'session' => 'Session',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquete()
    {
        return $this->hasOne(Paquetes::className(), ['idpaquete' => 'idpaquete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }

    public function getEstado($all = false)
    {
        $estado = ['armado', 'comprado', 'a cobrar', 'vencido'];
        if ($all)
            return $estado;
        return $estado[$this->idcompra];
    }

    public function getTipo($all = false)
    {
        $estado = ['', 'Pagos Net', 'Tarjetas de Credito', 'Tigo Money'];
        if ($all)
            return $estado;
        return $estado[$this->tipo_pago];
    }
}
