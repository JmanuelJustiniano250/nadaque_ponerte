<?php

namespace app\models;

/**
 * This is the model class for table "anuncios_visitas".
 *
 * @property int $idvisita
 * @property string $fecha_registro
 * @property int $idanuncio
 *
 * @property Anuncios $anuncio
 */
class AnunciosVisitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anuncios_visitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['idanuncio'], 'integer'],
            [['idanuncio'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncios::className(), 'targetAttribute' => ['idanuncio' => 'idanuncio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idvisita' => 'Idvisita',
            'fecha_registro' => 'Fecha Registro',
            'idanuncio' => 'Idanuncio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncio()
    {
        return $this->hasOne(Anuncios::className(), ['idanuncio' => 'idanuncio']);
    }
}
