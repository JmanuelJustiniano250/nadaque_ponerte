<?php

namespace app\models;

/**
 * This is the model class for table "tallas_producto".
 *
 * @property int $id_tp
 * @property string $value
 * @property string $nombre
 */
class TallasProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tallas_producto';
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
            'id_tp' => 'Id Tp',
            'value' => 'Value',
            'nombre' => 'Nombre',
        ];
    }
}
