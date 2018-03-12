<?php

namespace app\models;

/**
 * This is the model class for table "categorias".
 *
 * @property int $idcategoria
 * @property string $nombre
 * @property string $imagen
 * @property string $alias
 * @property string $fecha_registro
 * @property int $estado
 * @property int $idpadre
 * @property int $idmodulo
 *
 * @property Anuncios[] $anuncios
 * @property Banners[] $banners
 * @property Categorias $padre
 * @property Categorias[] $categorias
 * @property Modulos $modulo
 * @property Contenido[] $contenidos
 * @property Noticias[] $noticias
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias';
    }

    var $idfiltro;
    var $tmp;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['estado', 'idpadre', 'idmodulo'], 'integer'],
            [['nombre', 'alias'], 'string', 'max' => 200],
            [['imagen'], 'string', 'max' => 250],
            //[['idpadre'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['idpadre' => 'idcategoria']],
            [['idmodulo'], 'exist', 'skipOnError' => true, 'targetClass' => Modulos::className(), 'targetAttribute' => ['idmodulo' => 'idmodulo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategoria' => 'Idcategoria',
            'nombre' => 'Nombre',
            'imagen' => 'Imagen',
            'alias' => 'Alias',
            'fecha_registro' => 'Fecha Registro',
            'estado' => 'Estado',
            'idpadre' => 'Padre',
            'idmodulo' => 'Modulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncios::className(), ['idcategoria' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanners()
    {
        return $this->hasMany(Banners::className(), ['idcategoria' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPadre()
    {
        return $this->hasOne(Categorias::className(), ['idcategoria' => 'idpadre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categorias::className(), ['idpadre' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulo()
    {
        return $this->hasOne(Modulos::className(), ['idmodulo' => 'idmodulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContenidos()
    {
        return $this->hasMany(Contenido::className(), ['idcategoria' => 'idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticias::className(), ['idcategoria' => 'idcategoria']);
    }


    //
    public function getMenu($modulo)
    {
        $modulo = Modulos::findOne(['alias' => $modulo]);
        if ($modulo) {
            $data = $this::find()
                ->where(['idmodulo' => $modulo['idmodulo'], 'idpadre' => '0', 'estado' => '1'])
                ->orderBy(['idcategoria' => SORT_ASC])
                ->all();
            return $data;
        }
        return [];

    }

    static public function getSelectMenu($modulo)
    {
        $cat = Categorias::find()->where(['=', 'idmodulo', Modulos::findOne(['alias' => $modulo])['idmodulo']])->all();
        $result = [];
        $temp = [];
        foreach ($cat as $item) {
            if (empty($item->idpadre)) {
                array_push($temp, $item);
            }
        }
        foreach ($temp as $key => $item) {
            if (count($item->categorias) > 0) {
                foreach ($item->categorias as $value) {
                    if (count($value->categorias) > 0) {
                        foreach ($value->categorias as $value2) {
                            $result["<span class='fa fa-square'></span> " . $item->nombre]["<span class='fa fa-caret-right'></span> " . $value->nombre][$value2->idcategoria] = "<span class='fa fa-angle-double-right'></span> " . $value2->nombre;
                        }
                    } else {
                        $result["<span class='fa fa-square'></span> " . $item->nombre][$value->idcategoria] = "<span class='fa fa-caret-right'></span> " . $value->nombre;
                    }
                }
            } else {
                $result[$item->idcategoria] = "<span class='fa fa-square'></span> " . $item->nombre;
            }
        }
        return $result;
    }
}
