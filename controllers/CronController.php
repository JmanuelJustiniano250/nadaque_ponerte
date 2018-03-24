<?php

namespace app\controllers;

use app\components\Correos;
use app\models\Anuncios;
use app\models\Compra;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;


class CronController extends Controller
{


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /*
     * pagina principal
     */
    public function actionIndex()
    {
        return $this->redirect(Url::home());
    }

    /*
     * enviador de correos via cron job
     */
    public function actionCorreos()
    {
        if (!Yii::$app->request->isConsoleRequest)
            return $this->redirect(Url::home());

        $compras = Compra::findAll(['estado' => 1]);
        foreach ($compras as $item) {
            $fecha_ahora = time();
            $tiempo_dias = $item->paquete['tiempo_vida'];
            $anuncio = Anuncios::find()->where(['idcompra' => $item['idcompra']])->orderBy(['fecha_aprobado' => SORT_ASC])->one();
            $fecha_aprobado_y = date('Y', (strtotime($anuncio['fecha_aprobado'])));
            $fecha_aprobado_m = date('m', (strtotime($anuncio['fecha_aprobado'])));
            $fecha_aprobado_d = date('d', (strtotime($anuncio['fecha_aprobado'])));
            $fecha_vencimiento = mktime(0, 0, 0, $fecha_aprobado_m, ($fecha_aprobado_d + $tiempo_dias), $fecha_aprobado_y);
            //un dia antes
            $fecha_aviso1 = mktime(0, 0, 0, $fecha_aprobado_m, ($fecha_aprobado_d + $tiempo_dias - 1), $fecha_aprobado_y);
            //dos dias antes
            //$fecha_aviso2 = mktime(0,0,0,$fecha_aprobado_m,($fecha_aprobado_d+$tiempo_dias-2),$fecha_aprobado_y);
            if (date('Ymd', $fecha_ahora) == date('Ymd', $fecha_vencimiento)) {
                ///aqui codigo para enviar correos para anuncios vencidos
                $user = $item->usuario;
                if(!empty($user))
                    Correos::anuncioVencido($user,$item);
            }

            if ($fecha_ahora > $fecha_vencimiento) {
                //aqui se cambia los estados de la compra y de los anuncios creados,
                //al crear anuncio verificar que no este en estado 3 la compra
                $item->estado = 3;
                $item->save();
                $anuncios = Anuncios::find()->where(['idcompra' => $item['idcompra']])->all();
                foreach ($anuncios as $value) {
                    $value->estado = 3;
                    $value->save();
                }
            }

        }
    }
}
