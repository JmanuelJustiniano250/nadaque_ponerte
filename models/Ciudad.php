<?php

namespace app\models;

/**
 * This is the model class for table "ciudad".
 *
 * @property int $idciudad
 * @property string $value
 * @property string $nombre
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciudad';
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
            'idciudad' => 'Idciudad',
            'value' => 'Value',
            'nombre' => 'Nombre',
        ];
    }
}
