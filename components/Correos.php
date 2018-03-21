<?php

namespace app\components;

use app\models\Configuracion;
use Yii;
use yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Url;

class Correos extends Component
{

    static public function enviarCorreos()
    {

    }

    static public function nuevoUsuario($model,$pass)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1','¡Te damos la bienvenida,<br>'.$model->nombres . ' ' . $model->apellidos.'!');
        $mensaje .= Html::tag('p','Gracias por crear una cuenta en Nada que Ponerte, el mejor lugar para anunciar y encontrar maravillosos tesoros escondidos en closets cool de mujeres como tu y yo!');
        $mensaje .= Html::tag('h5','Tus datos de acceso son');
        $mensaje .= Html::tag('p',Html::tag('strong','EMAIL:').' '.$model->email);
        $mensaje .= Html::tag('p',Html::tag('strong','CONTRASEÑA:').' '.$pass);
        $mensaje .= Html::tag('p','Empieza a anunciar tus tesoros  haciendo clic <a target="_blank" href="'.Url::to(['site/vender'],true).'">clic aquí</a>');

        $mensaje2 = Html::tag('h1','¡Se registro un usuario!');
        $mensaje2 .= Html::tag('h5','Sus datos son');
        $mensaje2 .= Html::tag('p',Html::tag('strong','EMAIL:').' '.$model->email);
        $mensaje2 .= Html::tag('p',Html::tag('strong','NOMBRE:').' '.$model->nombres . ' ' . $model->apellidos);

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' -Registro completo')
                ->send();

            Yii::$app->mailer->compose('layouts/template', [
                'content' => $mensaje2,
                'config' => $conf,
            ])
                ->setTo($conf['email'])
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' -Registro Realizado')
                ->send();

            return true;
        }
        return false;
    }

    static public function nuevoNewsletter($model)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h2','¡Gracias por suscribirte al boletín de Nada que Ponerte!');
        $mensaje .= Html::tag('p','Te enviaremos de aquí en adelante correos electrónicos con contenido de nuestros anuncios, promociones, noticias, entradas a nuestro blog y comentándote novedades que sabemos que te interesarán.');
        $mensaje .= Html::tag('p','Queremos verte pronto por nuestra plataforma, tenemos muchos anuncios con prendas y accesorios que no vas a esperar tener, y te entraran ganitas de vaciar tu closet para publicar todo eso que no usas en buen estado ¡eso está garantizado!');
        $mensaje .= Html::tag('p','Para hacerte usuaria de la plataforma y poder anunciar haz <a target="_blank" href="'.Url::to(['site/register'],true).'">clic aquí</a>');
        $mensaje .= Html::tag('h4','¡Amarás Nada que Ponerte!');
        $mensaje .= Html::tag('p','Si tienes alguna duda o comentario haz <a target="_blank" href="'.Url::to(['site/contacto'],true).'">clic aquí</a>');

        $mensaje2 = Html::tag('h1','¡Nuevo usuario de boletin!');
        $mensaje2 .= Html::tag('h5','un usuario se registro con el siguiente correo');
        $mensaje2 .= Html::tag('p',Html::tag('strong','EMAIL:').' '.$model->email);

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' -Registro completo')
                ->send();

            Yii::$app->mailer->compose('layouts/template', [
                'content' => $mensaje2,
                'config' => $conf,
            ])
                ->setTo($conf['email'])
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' -Registro Realizado')
                ->send();

            return true;
        }
        return false;
    }

    static public function recoveryPass($model,$pass)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Recuperacion de contraseña');
        $mensaje .= Html::tag('h5', 'Tus nuevos datos de acceso son');
        $mensaje .= Html::tag('p', Html::tag('strong', 'EMAIL:') . ' ' . $model->email);
        $mensaje .= Html::tag('p', Html::tag('strong', 'CONTRASEÑA:') . ' ' . $pass);
        $mensaje .= Html::tag('p', 'Empieza a anunciar tus tesoros  haciendo <a target="_blank" href="'.Url::to(['site/vender'],true).'">clic aquí</a>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Recuperacion de contraseña')
                ->send();

            return true;
        }
        return false;
    }

    static public function nuevoAnuncio($model)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Nuevo anuncio');
        $mensaje .= Html::tag('h5', 'se registro un nuevo anuncio');
        $mensaje .= Html::tag('p', 'sigue el link para ver tu anuncio <a target="_blank" href="'.Url::to(['site/vender'],true).'">clic aquí</a>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Nuevo anuncio')
                ->send();

            return true;
        }
        return false;
    }

    static public function nuevoMensaje($model)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Nuevo Mensaje');
        $mensaje .= Html::tag('h5', 'se registro un nuevo mensaje');
        $mensaje .= Html::tag('p', 'sigue el link para ver tu mensaje <a target="_blank" href="'.Url::to(['cuenta/mensajeria'],true).'">clic aquí</a>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Nuevo Mensaje')
                ->send();

            return true;
        }
        return false;
    }

    static public function nuevoComentario($model)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Nuevo Comentario');
        $mensaje .= Html::tag('h5', 'se registro un nuevo cometario');
        $mensaje .= Html::tag('p', 'sigue el link para ver tu comentario <a target="_blank" href="'.Url::to(['cuenta/comentarios'],true).'">clic aquí</a>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Nuevo Mensaje')
                ->send();

            return true;
        }
        return false;
    }

    static public function nuevaCalificacion($model)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Nueva Calificacion');
        $mensaje .= Html::tag('h5', 'se registro una nueva calificacion');
        $mensaje .= Html::tag('p', 'sigue el link para ver tu calificacion <a target="_blank" href="'.Url::to(['cuenta/calificaciones'],true).'">clic aquí</a>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Nueva Calificacion')
                ->send();

            return true;
        }
        return false;
    }

    static public function anuncioAcepado($model,$id)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Anuncio Aceptado');
        $mensaje .= Html::tag('h5', 'Su anuncio fue aceptado');
        $mensaje .= Html::tag('p', 'sigue el link para ver tu anuncio <a target="_blank" href="'.Url::to(['site/item','id'=>$id],true).'">clic aquí</a>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Anuncio aceptado')
                ->send();

            return true;
        }
        return false;
    }

    static public function anuncioRechazado($model,$anuncio)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Anuncio Rechazado');
        $mensaje .= Html::tag('h5', 'tu anuncio fue rechazado por:<br><strong>'.$anuncio->razon.'</strong>');
        $mensaje .= Html::tag('p', 'para editar tu anuncio sigue el siguiente link <a target="_blank" href="'.Url::to(['cuenta/create','id'=>$anuncio->idanuncio],true).'">clic aquí</a>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Estado de anuncio')
                ->send();

            return true;
        }
        return false;
    }

    static public function anuncioRechazadoDefinitivo($model,$anuncio)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Anuncio Rechazado Definitivo');
        $mensaje .= Html::tag('h5', 'tu anuncio fue rechazado definitivamente por:<br><strong>'.$anuncio->razon.'</strong>');

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template2', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setTo($model->email)
                ->setFrom([$conf['email'] => $conf['titulo_pagina']])
                ->setSubject($conf->titulo_pagina . ' - Estado de anuncio')
                ->send();

            return true;
        }
        return false;
    }

    public function contact($model)
    {
        $conf = Configuracion::find()->one();
        $mensaje = Html::tag('h1', 'Formulario de contacto');
        $mensaje .= Html::tag('h5', 'Tus nuevos datos de acceso son');
        $mensaje .= Html::tag('p', Html::tag('strong', 'EMAIL:') . ' ' . $model->email);
        $mensaje .= Html::tag('p', Html::tag('strong', 'NOMBRE:') . ' ' . $model->nombre);
        $mensaje .= Html::tag('p', Html::tag('strong', 'TELEFONO:') . ' ' . $model->telefono);
        $mensaje .= Html::tag('p', Html::tag('strong', 'MENSAJE:') . '<br>' . $model->mensaje);

        if ($model->validate()) {

            Yii::$app->mailer->compose('layouts/template', [
                'config' => $conf,
                'content' => $mensaje,
            ])
                ->setFrom($model->email)
                ->setTo($conf['email'])
                ->setSubject($conf->titulo_pagina . ' - Formulario de contacto')
                ->send();

            return true;
        }
        return false;
    }
}