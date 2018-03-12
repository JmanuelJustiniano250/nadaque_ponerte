<?php

namespace app\models;

/**
 * This is the model class for table "configuracion".
 *
 * @property int $idconfiguracion
 * @property string $titulo_pagina
 * @property string $resumen_pagina
 * @property string $meta_palabrasclaves
 * @property string $email
 * @property string $telefono
 * @property string $movil
 * @property string $direccion
 * @property string $twitter
 * @property string $facebook
 * @property string $youtube
 * @property string $coordenadas
 * @property string $cron
 * @property string $google_analitics
 */
class Configuracion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuracion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resumen_pagina', 'meta_palabrasclaves'], 'string'],
            [['meta_palabrasclaves'], 'required'],
            [['titulo_pagina'], 'string', 'max' => 500],
            [['email'], 'string', 'max' => 250],
            [['telefono', 'movil'], 'string', 'max' => 15],
            [['direccion', 'twitter', 'facebook', 'youtube', 'instagram', 'coordenadas', 'google_analitics'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idconfiguracion' => 'Idconfiguracion',
            'titulo_pagina' => 'Titulo Pagina',
            'resumen_pagina' => 'Resumen Pagina',
            'meta_palabrasclaves' => 'Meta Palabrasclaves',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'movil' => 'Movil',
            'direccion' => 'Direccion',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'youtube' => 'Youtube',
            'instagram' => 'Instagram',
            'coordenadas' => 'Coordenadas',
            'cron' => 'Cron',
            'google_analitics' => 'Google Analitics',
        ];
    }
}
