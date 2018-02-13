<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "noticias".
 *
 * @property integer $idnoticia
 * @property integer $idcategoria
 * @property string $fecha_noticia
 * @property string $fuente
 * @property string $foto
 * @property string $titulo
 * @property string $resumen
 * @property string $contenido
 * @property string $video
 * @property integer $estado
 * @property string $fecha_registro
 */
class Noticias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticias';
    }

    /**
     * @inheritdoc
     */
    var $file;

    public function rules()
    {
        return [
            [['idcategoria', 'estado'], 'integer'],
            [['fecha_noticia', 'fecha_registro'], 'safe'],
            [['resumen', 'contenido'], 'string'],
            [['fuente', 'titulo'], 'string', 'max' => 100],
            [['foto', 'video'], 'string', 'max' => 250],
            ['file', 'file', 'extensions' => 'jpg, jpeg, png', 'mimeTypes' => 'image/jpeg, image/png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnoticia' => 'Idnoticia',
            'idcategoria' => 'Categoria',
            'fecha_noticia' => 'Fecha Noticia',
            'fuente' => 'Fuente',
            'foto' => 'Foto',
            'titulo' => 'Titulo',
            'resumen' => 'Resumen',
            'contenido' => 'Contenido',
            'video' => 'Video',
            'estado' => 'Estado',
            'fecha_registro' => 'Fecha Registro',
            'file' => 'Foto',
        ];
    }

    //
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['idcategoria' => 'idcategoria']);
    }

    public function getGaleria()
    {
        return $this->hasMany(NoticiasGaleria::className(), ['idnoticia' => 'idnoticia']);
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
