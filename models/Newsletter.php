<?php

namespace app\models;

/**
 * This is the model class for table "newsletter".
 *
 * @property int $idnews
 * @property string $nombre
 * @property string $email
 * @property string $fecha_registro
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['nombre'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 200],
            ['email', 'email'],
            ['email', 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnews' => 'Idnews',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'fecha_registro' => 'Fecha Registro',
        ];
    }
}
