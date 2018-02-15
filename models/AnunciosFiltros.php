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
}
