<?php

namespace app\models;

/**
 * This is the model class for table "mensajes".
 *
 * @property int $idmensaje
 * @property int $idusuario
 * @property string $titulo
 * @property string $detalle
 * @property string $fecha_registro
 * @property int $tipo
 * @property int $estado
 * @property int $idanuncio
 * @property int $idvendedor
 */
class Mensajes extends \yii\db\ActiveRecord
{
    //tipo ['mensaje','comentario']
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mensajes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'detalle', 'tipo', 'estado'], 'required'],
            [['idusuario', 'tipo', 'estado', 'idanuncio', 'idvendedor'], 'integer'],
            [['detalle'], 'string'],
            [['fecha_registro'], 'safe'],
            [['titulo'], 'string', 'max' => 250],
        ];
    }

    //tipo [0=>mensajes,1=>comentario]

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmensaje' => 'Idmensaje',
            'idusuario' => 'Idusuario',
            'idanuncio' => 'idanuncio',
            'idvendedor' => 'Idvendedor',
            'titulo' => 'Titulo',
            'detalle' => 'Detalle',
            'fecha_registro' => 'Fecha Registro',
            'tipo' => 'Tipo',
            'estado' => 'Estado',
        ];
    }

    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }

    public function getVendedor()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idvendedor']);
    }

    public function getAnuncio()
    {
        return $this->hasOne(Anuncios::className(), ['idanuncio' => 'idanuncio']);
    }


    static public function haveNew($tipo, $usuario = null, $anuncio = null)
    {
        $mensaje = Mensajes::find();
        $mensaje = $mensaje->andWhere(['tipo' => $tipo]);
        $mensaje = $mensaje->andWhere(['estado' => 0]);
        if (!empty($usuario)) {
            $mensaje = $mensaje->andWhere(['idvendedor' => $usuario]);
        }

        if (!empty($anuncio))
            $mensaje = $mensaje->andWhere(['idanuncio' => $anuncio]);
        else{
            if($tipo==1){
                $mensaje = $mensaje->andWhere(['!=','idanuncio' ,'0']);
            }
        }

        return ($mensaje->count() > 0);
    }
}
