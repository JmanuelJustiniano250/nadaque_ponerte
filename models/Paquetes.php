<?php

namespace app\models;

use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "paquetes".
 *
 * @property int $idpaquete
 * @property string $nombre
 * @property double $precio
 * @property string $descripcion
 * @property int $estado
 * @property int $nro_anuncios
 * @property int $tiempo_vida
 * @property string $fecha_registro
 *
 * @property Anuncios[] $anuncios
 * @property Compra[] $compras
 * @property Promociones[] $promociones
 */
class Paquetes extends \yii\db\ActiveRecord implements CartPositionInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paquetes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['precio'], 'number'],
            [['descripcion'], 'string'],
            [['estado', 'nro_anuncios', 'tiempo_vida'], 'integer'],
            [['fecha_registro'], 'safe'],
            [['nombre'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpaquete' => 'Idpaquete',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'nro_anuncios' => 'Nro Anuncios',
            'tiempo_vida' => 'Tiempo Vida',
            'fecha_registro' => 'Fecha Registro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncios::className(), ['idpaquete' => 'idpaquete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['idpaquete' => 'idpaquete']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromociones()
    {
        return $this->hasMany(Promociones::className(), ['idpaquete' => 'idpaquete']);
    }


    use CartPositionTrait;

    public function getPrice()
    {
        return $this->precio;
    }

    public function getId()
    {
        return $this->idpaquete;
    }
}
