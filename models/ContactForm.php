<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $nombre;
    public $email;
    public $apellido;
    public $telefono;
    public $pais;
    public $ciudad;
    public $subject;
    public $mensaje;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // nombre, email, subject and mensaje are required
            [['nombre', 'email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'nombre' => false,
            'apellido' => false,
            'email' => false,
            'mensaje' => false,
            'pais' => false,
            'ciudad' => false,
            'telefono' => false,
            'verifyCode' => false,
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose('layouts/template', [
                'titulo' => 'Formulario de contacto de la pagina web',
                'titulo2' => 'se escribio el siguiente mensaje',
                'contenido' => $this->mensaje,
                'config' => Configuracion::find()->one(),
            ])
                ->setTo($email)
                ->setFrom([$this->email => $this->nombre])
                ->setSubject($this->subject)
                //->setTextBody($this->mensaje)
                ->send();

            return true;
        }
        return false;
    }
}
