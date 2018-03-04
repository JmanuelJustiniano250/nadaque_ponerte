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
            [['idanuncio', 'idciudad', 'idcolores', 'idcondicion', 'idmarca', 'idmaterial', 'idtalla'], 'integer'],
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
        return $this->hasOne(ColoresProductos::className(), ['idcolores' => 'id_cp']);
    }
    public function getCondicion()
    {
        return $this->hasOne(CondicionProducto::className(), ['idcondicion' => 'id_cp']);
    }
    public function getMarca()
    {
        return $this->hasOne(MarcaProducto::className(), ['idmarca' => 'id_msp']);
    }
    public function getMaterial()
    {
        return $this->hasOne(MaterialProducto::className(), ['idmaterial' => 'id_mp']);
    }
    public function getTalla()
    {
        return $this->hasOne(TallasProducto::className(), ['idtalla' => 'id_tp']);
    }

}
