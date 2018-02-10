<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticias_galeria".
 *
 * @property integer $idgaleria
 * @property string $fecha_registro
 * @property string $foto
 * @property integer $idnoticia
 */
class NoticiasGaleria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    var $file;

    public static function tableName()
    {
        return 'noticias_galeria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['idnoticia'], 'integer'],
            [['foto'], 'string', 'max' => 250],
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
            'fecha_registro' => 'Fecha Registro',
            'foto' => 'Foto',
            'idnoticia' => 'Idnoticia',
        ];
    }

    public function upload($name)
    {
        if ($this->validate()) {
            if (!empty($this->file)) {
                $path = Yii::getAlias('@webroot') . '/imagen/noticias/';
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
