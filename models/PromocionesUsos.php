<?php

namespace app\models;

/**
 * This is the model class for table "promociones_usos".
 *
 * @property int $idpuso
 * @property int $idusuario
 * @property int $idpromocion
 * @property string $fecha_registro
 *
 * @property Promociones $promocion
 * @property Usuarios $usuario
 */
class PromocionesUsos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promociones_usos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'idpromocion'], 'integer'],
            [['fecha_registro'], 'safe'],
            [['idpromocion'], 'exist', 'skipOnError' => true, 'targetClass' => Promociones::className(), 'targetAttribute' => ['idpromocion' => 'idpromocion']],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpuso' => 'Idpuso',
            'idusuario' => 'Idusuario',
            'idpromocion' => 'Idpromocion',
            'fecha_registro' => 'Fecha Registro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromocion()
    {
        return $this->hasOne(Promociones::className(), ['idpromocion' => 'idpromocion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }
}
