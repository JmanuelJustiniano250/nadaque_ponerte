<?php

namespace app\models;

/**
 * This is the model class for table "anuncios_filtros".
 *
 * @property int $idpf
 * @property int $idfiltro
 * @property int $idanuncio
 * @property string $fecha_registro
 *
 * @property Anuncios $anuncio
 * @property Filtros $filtro
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
            [['idfiltro', 'idanuncio'], 'integer'],
            [['fecha_registro'], 'safe'],
            [['idanuncio'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncios::className(), 'targetAttribute' => ['idanuncio' => 'idanuncio']],
            [['idfiltro'], 'exist', 'skipOnError' => true, 'targetClass' => Filtros::className(), 'targetAttribute' => ['idfiltro' => 'idfiltro']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpf' => 'Idpf',
            'idfiltro' => 'Idfiltro',
            'idanuncio' => 'Idanuncio',
            'fecha_registro' => 'Fecha Registro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncio()
    {
        return $this->hasOne(Anuncios::className(), ['idanuncio' => 'idanuncio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiltro()
    {
        return $this->hasOne(Filtros::className(), ['idfiltro' => 'idfiltro']);
    }
}
