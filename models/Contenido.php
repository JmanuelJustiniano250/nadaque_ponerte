<?php

namespace app\models;

/**
 * This is the model class for table "contenido".
 *
 * @property int $idcontenido
 * @property int $idcategoria
 * @property string $titulo
 * @property string $contenido
 * @property string $fecha_modificacion
 * @property int $estado
 *
 * @property Categorias $categoria
 */
class Contenido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contenido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategoria', 'estado'], 'integer'],
            [['contenido'], 'string'],
            [['fecha_modificacion'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['idcategoria' => 'idcategoria']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcontenido' => 'Idcontenido',
            'idcategoria' => 'Categoria',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'fecha_modificacion' => 'Fecha Modificacion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['idcategoria' => 'idcategoria']);
    }
}
