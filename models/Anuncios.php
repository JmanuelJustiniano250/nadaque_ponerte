<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "anuncios".
 *
 * @property int $idanuncio
 * @property int $idcategoria
 * @property int $idusuario
 * @property string $titulo
 * @property string $decripcion
 * @property string $otra_descripcion
 * @property string $codigo
 * @property string $foto
 * @property string $foto2
 * @property string $foto3
 * @property string $foto4
 * @property string $foto5
 * @property string $precio
 * @property int $estado
 * @property int $enable
 * @property string $fecha_registro
 * @property string $fecha_aprobado
 * @property int $idcompra
 * @property string $razon
 * @property int $visitas
 *
 * @property Categorias $categoria
 * @property Paquetes $paquete
 * @property Usuarios $usuario
 * @property AnunciosFiltros[] $anunciosFiltros
 * @property AnunciosGaleria[] $anunciosGalerias
 * @property AnunciosVisitas[] $anunciosVisitas
 * @property Deseo[] $deseos
 */
class Anuncios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anuncios';
    }

    /**
     * @inheritdoc
     */
    var $file;
    var $file2;
    var $file3;
    var $file4;
    var $file5;
    var $filtro;
    var $alias;

    public function rules()
    {
        return [
            [['idcompra'], 'required'],
            [['idcategoria', 'idusuario', 'estado', 'enable', 'idcompra', 'visitas','vendido'], 'integer'],
            [['decripcion', 'otra_descripcion', 'razon'], 'string'],
            [['fecha_registro', 'fecha_aprobado', 'filtro'], 'safe'],
            [['titulo'], 'string', 'max' => 200],
            [['codigo'], 'string', 'max' => 20],
            [['foto','foto2','foto3','foto4','foto5'], 'string', 'max' => 250],
            [['precio', 'precio_promocion'], 'string', 'max' => 10],
            [['idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['idcategoria' => 'idcategoria']],
            [['idcompra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['idcompra' => 'idcompra']],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
            [['file','file2','file3','file4','file5'], 'file', 'extensions' => 'jpg, jpeg, png', 'mimeTypes' => 'image/jpeg, image/png'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idanuncio' => 'Idanuncio',
            'idcategoria' => 'Categoria',
            'idusuario' => 'Usuario',
            'titulo' => 'Titulo',
            'decripcion' => 'Decripcion',
            'otra_descripcion' => 'Otra Descripcion',
            'codigo' => 'Codigo',
            'foto' => 'Foto',
            'foto2' => 'Foto2',
            'foto3' => 'Foto3',
            'foto4' => 'Foto4',
            'foto5' => 'Foto5',
            'file' => 'Foto Portada',
            'precio' => 'Precio',
            'precio_promocion' => 'Precio Promocion',
            'estado' => 'Estado',
            'enable' => 'Enable',
            'fecha_registro' => 'Fecha Registro',
            'fecha_aprobado' => 'Fecha Aprobado',
            'idcompra' => 'Paquete',
            'visitas' => 'Visitas',
            'razon' => 'Razon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['idcategoria' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getPaquete()
    {
        return $this->hasOne(Paquetes::className(), ['idcompra' => 'idcompra']);
    }*/
    public function getPaquete()
    {
        return $this->hasOne(Compra::className(), ['idcompra' => 'idcompra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnunciosFiltros()
    {
        return $this->hasOne(AnunciosFiltros::className(), ['idanuncio' => 'idanuncio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnunciosGalerias()
    {
        return $this->hasMany(AnunciosGaleria::className(), ['idanuncio' => 'idanuncio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnunciosVisitas()
    {
        return $this->hasMany(AnunciosVisitas::className(), ['idanuncio' => 'idanuncio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeseos()
    {
        return $this->hasMany(Deseo::className(), ['idanuncio' => 'idanuncio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensajes()
    {
        return $this->hasMany(Mensajes::className(), ['idanuncio' => 'idanuncio']);
    }

    public function upload($name=null)
    {
        if ($this->validate(['file','file2','file3','file4','file5'])) {
            $path = Yii::getAlias('@webroot') . '/imagen/anuncios/';

            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $name = Yii::$app->security->generateRandomString();
            if (!empty($this->file)) {
                $path = $path . $name . '.' . $this->file->extension;
                if ($this->file->saveAs($path))
                    if ($this->foto) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto);
                        }
                    }
                    $this->foto = $name . '.' . $this->file->extension;
            }

            $name2 = Yii::$app->security->generateRandomString();
            if (!empty($this->file2)) {
                $path = $path . $name2 . '.' . $this->file2->extension;
                if ($this->file2->saveAs($path))
                    if ($this->foto2) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto2)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto2);
                        }
                    }
                $this->foto2 = $name2 . '.' . $this->file2->extension;
            }

            $name3 = Yii::$app->security->generateRandomString();
            if (!empty($this->file3)) {
                $path = $path . $name3 . '.' . $this->file3->extension;
                if ($this->file3->saveAs($path))
                    if ($this->foto3) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto3)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto3);
                        }
                    }
                $this->foto3 = $name3 . '.' . $this->file3->extension;
            }

            $name4 = Yii::$app->security->generateRandomString();
            if (!empty($this->file4)) {
                $path = $path . $name4 . '.' . $this->file4->extension;
                if ($this->file4->saveAs($path))
                    if ($this->foto4) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto4)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto4);
                        }
                    }
                $this->foto4 = $name4 . '.' . $this->file4->extension;
            }

            $name5 = Yii::$app->security->generateRandomString();
            if (!empty($this->file5)) {
                $path = $path . $name5 . '.' . $this->file5->extension;
                if ($this->file5->saveAs($path))
                    if ($this->foto5) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto5)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $this->foto5);
                        }
                    }
                $this->foto5 = $name5 . '.' . $this->file5->extension;
            }

            return true;
        }
        return false;
    }

    public function getEstado($all = false)
    {
        $estado = [
            'revision',
            'aprovado',
            'rechazado',
            'vencido',
            'rechazo-definitivo',
            'destacado',
            'vendido'
        ];
        if ($all)
            return $estado;

        return $estado[$this->estado];
    }
}
