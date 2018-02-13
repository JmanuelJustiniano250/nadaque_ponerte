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
    var $filtro;
    var $alias;

    public function rules()
    {
        return [
            [['idcompra'], 'required'],
            [['idcategoria', 'idusuario', 'estado', 'enable', 'idcompra', 'visitas'], 'integer'],
            [['decripcion', 'otra_descripcion', 'razon'], 'string'],
            [['fecha_registro', 'fecha_aprobado', 'filtro'], 'safe'],
            [['titulo'], 'string', 'max' => 200],
            [['codigo'], 'string', 'max' => 20],
            [['foto'], 'string', 'max' => 250],
            [['precio', 'precio_promocion'], 'string', 'max' => 10],
            [['idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['idcategoria' => 'idcategoria']],
            [['idcompra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['idcompra' => 'idcompra']],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
            ['file', 'file', 'extensions' => 'jpg, jpeg, png', 'mimeTypes' => 'image/jpeg, image/png'],
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
        return $this->hasMany(AnunciosFiltros::className(), ['idanuncio' => 'idanuncio']);
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

    public function getEstado($all = false)
    {
        $estado = [
            'revision',
            'aprovado',
            'rechazado',
            'vencido',
            'rechazo-definitivo'
        ];
        if ($all)
            return $estado;

        return $estado[$this->estado];
    }
}
