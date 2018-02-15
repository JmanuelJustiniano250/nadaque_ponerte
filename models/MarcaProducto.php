<?php

namespace app\models;

/**
 * This is the model class for table "marca_producto".
 *
 * @property int $id_msp
 * @property string $value
 * @property string $nombre
 */
class MarcaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marca_producto';
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
            'id_msp' => 'Id Msp',
            'value' => 'Value',
            'nombre' => 'Nombre',
        ];
    }
}
