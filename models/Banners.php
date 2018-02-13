<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property integer $idbanner
 * @property string $titulo
 * @property integer $idcategoria
 * @property string $foto
 * @property string $descripcion
 * @property integer $target
 * @property string $url
 * @property string $fecha_regisro
 * @property integer $estado
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    var $file;

    public function rules()
    {
        return [
            [['idcategoria', 'target', 'estado'], 'integer'],
            [['fecha_regisro'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['foto', 'url'], 'string', 'max' => 250],
            [['descripcion'], 'string', 'max' => 100],
            ['file', 'file', 'extensions' => 'jpg, jpeg, png', 'mimeTypes' => 'image/jpeg, image/png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbanner' => 'Idbanner',
            'titulo' => 'Titulo',
            'idcategoria' => 'Categoria',
            'foto' => 'Foto',
            'descripcion' => 'Descripcion',
            'target' => 'Target',
            'url' => 'Url',
            'fecha_regisro' => 'Fecha Regisro',
            'estado' => 'Estado',
        ];
    }

    public function upload($name)
    {
        if ($this->validate()) {
            if (!empty($this->file)) {
                $path = Yii::getAlias('@webroot') . '/imagen/banners/';
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

    //
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['idcategoria' => 'idcategoria']);
    }
}
