<?php

namespace app\models;

/**
 * This is the model class for table "colores_productos".
 *
 * @property int $id_cp
 * @property string $value
 * @property string $nombre
 */
class ColoresProductos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colores_productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string', 'max' => 10],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_co' => 'Id Co',
            'value' => 'Value',
            'nombre' => 'Nombre',
        ];
    }
}
