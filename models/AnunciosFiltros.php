<?php

namespace app\models;

/**
 * This is the model class for table "anuncios_filtros".
 *
 * @property int $idfiltro
 * @property int $idanuncio
 * @property int $idciudad
 * @property int $idcolores
 * @property int $idcondicion
 * @property int $idmarca
 * @property int $idmaterial
 * @property int $idtalla
 * @property string $fecha_creacion
 */
class AnunciosFiltros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anuncios_filtros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanuncio',  'id_cp', 'id_co', 'id_msp', 'id_mp', 'id_tp'  ], 'integer'],
            [['fecha_creacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfiltro' => 'Idfiltro',
            'idanuncio' => 'Idanuncio',
            'idciudad' => 'Idciudad',
            'idcolores' => 'Idcolores',
            'idcondicion' => 'Idcondicion',
            'idmarca' => 'Idmarca',
            'idmaterial' => 'Idmaterial',
            'idtalla' => 'Idtalla',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncio()
    {
        return $this->hasOne(Anuncios::className(), ['idanuncio' => 'idanuncio']);
    }

    public function getCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['idciudad' => 'idciudad']);
    }

    public function getColor()
    {
        return $this->hasOne(ColoresProductos::className(), ['id_co' => 'id_co']);
    }

    public function getCondicion()
    {
        return $this->hasOne(CondicionProducto::className(), ['id_cp' => 'id_cp']);
    }

    public function getMarca()
    {
        return $this->hasOne(MarcaProducto::className(), ['id_msp' => 'id_msp']);
    }

    public function getMaterial()
    {
        return $this->hasOne(MaterialProducto::className(), ['id_mp' => 'id_mp']);
    }

    public function getTalla()
    {
        return $this->hasOne(TallasProducto::className(), ['id_tp' => 'id_tp']);
    }

}
