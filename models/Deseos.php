<?php

namespace app\models;

/**
 * This is the model class for table "deseos".
 *
 * @property integer $iddeseo
 * @property integer $idnuncio
 * @property string $fecha_registro
 * @property integer $idusuario
 */
class Deseos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deseos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idnuncio', 'idusuario'], 'integer'],
            [['fecha_registro'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddeseo' => 'Iddeseo',
            'idnuncio' => 'Anuncio',
            'fecha_registro' => 'Fecha Registro',
            'idusuario' => 'Usuario',
        ];
    }

    //
    public function getAnuncio()
    {
        return $this->hasOne(Anuncios::className(), ['idanuncio' => 'idnuncio']);
    }
    //
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }
}
