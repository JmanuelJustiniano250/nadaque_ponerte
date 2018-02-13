<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anuncios_galeria".
 *
 * @property int $idgaleria
 * @property string $foto
 * @property string $fecha_registro
 * @property int $idanuncio
 *
 * @property Anuncios $anuncio
 */
class AnunciosGaleria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    var $file;

    public static function tableName()
    {
        return 'anuncios_galeria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['idanuncio'], 'integer'],
            [['foto'], 'string', 'max' => 250],
            [['idanuncio'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncios::className(), 'targetAttribute' => ['idanuncio' => 'idanuncio']],
            ['file', 'file', 'extensions' => 'jpg, jpeg, png', 'mimeTypes' => 'image/jpeg, image/png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgaleria' => 'Idgaleria',
            'foto' => 'Foto',
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

    public function upload($name)
    {
        if ($this->validate()) {
            if (!empty($this->file)) {
                $path = Yii::getAlias('@webroot') . '/imagen/anuncios/';
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }
                $path = $path . $name . '.' . $this->file->extension;
                if ($this->file->saveAs($path))
                    return true;
            }
        }
        return false;
    }
}
