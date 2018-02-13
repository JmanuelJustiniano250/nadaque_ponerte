<?php

namespace app\models;

/**
 * This is the model class for table "promociones".
 *
 * @property int $idpromocion
 * @property string $codigo
 * @property int $nro_usos
 * @property int $estado
 * @property string $fecha_limite
 * @property string $fehca_registro
 * @property int $idadministrator
 * @property int $idpaquete
 * @property integer $precio
 *
 * @property Administrador $administrator
 * @property Paquetes $paquete
 * @property PromocionesUsos[] $promocionesUsos
 */
class Promociones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promociones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nro_usos', 'estado', 'idadministrator', 'idpaquete', 'precio'], 'integer'],
            [['fecha_limite', 'fehca_registro'], 'safe'],
            [['codigo'], 'string', 'max' => 200],
            [['idadministrator'], 'exist', 'skipOnError' => true, 'targetClass' => Administrador::className(), 'targetAttribute' => ['idadministrator' => 'idamin']],
            [['idpaquete'], 'exist', 'skipOnError' => true, 'targetClass' => Paquetes::className(), 'targetAttribute' => ['idpaquete' => 'idpaquete']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpromocion' => 'Idpromocion',
            'codigo' => 'Codigo',
            'nro_usos' => 'Nro Usos',
            'estado' => 'Estado',
            'fecha_limite' => 'Fecha Limite',
            'fehca_registro' => 'Fehca Registro',
            'idadministrator' => 'Administrator',
            'idpaquete' => 'Paquete',
            'precio' => 'Precio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrator()
    {
        return $this->hasOne(Administrador::className(), ['idamin' => 'idadministrator']);
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
    public function getPromocionesUsos()
    {
        return $this->hasMany(PromocionesUsos::className(), ['idpromocion' => 'idpromocion']);
    }
}
