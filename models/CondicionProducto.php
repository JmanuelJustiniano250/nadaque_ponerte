<?php

namespace app\models;

/**
 * This is the model class for table "condicion_producto".
 *
 * @property int $id_cp
 * @property string $value
 * @property string $nombre
 */
class CondicionProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'condicion_producto';
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
            'id_cp' => 'Id Cp',
            'value' => 'Value',
            'nombre' => 'Nombre',
        ];
    }
}
