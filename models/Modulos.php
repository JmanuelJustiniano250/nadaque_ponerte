<?php

namespace app\models;

/**
 * This is the model class for table "modulos".
 *
 * @property int $idmodulo
 * @property string $nombre
 * @property string $alias
 * @property string $fecha_registro
 * @property int $estado
 * @property string $icono
 *
 * @property Categorias[] $categorias
 */
class Modulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['estado'], 'integer'],
            [['nombre', 'alias'], 'string', 'max' => 200],
            [['icono'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmodulo' => 'Idmodulo',
            'nombre' => 'Nombre',
            'alias' => 'Alias',
            'fecha_registro' => 'Fecha Registro',
            'estado' => 'Estado',
            'icono' => 'Icono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categorias::className(), ['idmodulo' => 'idmodulo']);
    }
}
