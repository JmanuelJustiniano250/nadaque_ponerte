<?php

namespace app\models;

/**
 * This is the model class for table "deseo".
 *
 * @property int $iddeseo
 * @property string $fecha_registro
 * @property int $idanuncio
 * @property int $idusuario
 *
 * @property Anuncios $anuncio
 * @property Usuarios $usuario
 */
class Deseo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deseo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['idanuncio', 'idusuario'], 'integer'],
            [['idanuncio'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncios::className(), 'targetAttribute' => ['idanuncio' => 'idanuncio']],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddeseo' => 'Iddeseo',
            'fecha_registro' => 'Fecha Registro',
            'idanuncio' => 'Idanuncio',
            'idusuario' => 'Idusuario',
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
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }
}
