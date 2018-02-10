<?php

namespace app\models;

/**
 * This is the model class for table "faq".
 *
 * @property integer $idfaq
 * @property string $titulo
 * @property string $contenido
 * @property string $fecha_creacion
 * @property integer $estado
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contenido'], 'string'],
            [['fecha_creacion'], 'safe'],
            [['estado'], 'integer'],
            [['titulo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfaq' => 'Idfaq',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'fecha_creacion' => 'Fecha Creacion',
            'estado' => 'Estado',
        ];
    }
}
