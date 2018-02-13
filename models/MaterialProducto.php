<?php

namespace app\models;

/**
 * This is the model class for table "material_producto".
 *
 * @property int $id_mp
 * @property string $value
 * @property string $nombre
 */
class MaterialProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_producto';
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
            'id_mp' => 'Id Mp',
            'value' => 'Value',
            'nombre' => 'Nombre',
        ];
    }
}
