<?php

namespace app\models;

/**
 * This is the model class for table "filtros".
 *
 * @property int $idfiltro
 * @property string $nombre
 * @property int $estado
 * @property string $fecha_registro
 * @property int $idPadre
 *
 * @property AnunciosFiltros[] $anunciosFiltros
 * @property Filtros $padre
 * @property Filtros[] $filtros
 */
class Filtros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filtros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado', 'idPadre'], 'integer'],
            [['fecha_registro'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
            [['idPadre'], 'exist', 'skipOnError' => true, 'targetClass' => Filtros::className(), 'targetAttribute' => ['idPadre' => 'idfiltro']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfiltro' => 'Idfiltro',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
            'fecha_registro' => 'Fecha Registro',
            'idPadre' => 'Padre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnunciosFiltros()
    {
        return $this->hasMany(AnunciosFiltros::className(), ['idfiltro' => 'idfiltro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadre()
    {
        return $this->hasOne(Filtros::className(), ['idfiltro' => 'idPadre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiltros()
    {
        return $this->hasMany(Filtros::className(), ['idPadre' => 'idfiltro']);
    }
}
