<?php

namespace app\controllers;

use app\components\Correos;
use app\models\Anuncios;
use app\models\AnunciosFiltros;
use app\models\AnunciosGaleria;
use app\models\AnunciosSearch;
use app\models\Categorias;
use app\models\Configuracion;
use app\models\ContactForm;
use app\models\Contenido;
use app\models\Faq;
use app\models\LoginWeb;
use app\models\Noticias;
use app\models\NoticiasSearch;
use app\models\Paquetes;
use app\models\Usuarios;
use Yii;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;


class SiteController extends Controller
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
        $data['configuracion'] = Configuracion::find()->one();
        /* if ($data['configuracion']['cron'] == 0) {
             //activa por defecto el cron mejorar si es posible o ponerlo para activar o desactivar manualmente
             $cronTab = new CronTab();
             $cronTab->mergeFilter = Yii::$app->basePath . '/yii'; // filter all invocation of Yii console
             $cronTab->setJobs([
                 [
                     'hour' => '1',
                     'command' => 'php ' . Yii::$app->basePath . '/yii cron/correos',
                 ],
             ]);
             $cronTab->apply();
             $data['configuracion']->cron = 1;
             $data['configuracion']->save();
         }*/

        return $this->render('index', $data);
    }

    public function actionContacto()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contacto', [
            'model' => $model,
        ]);
    }

    public function actionNoticias($id = null)
    {
        $searchModel = New NoticiasSearch();
        $seach = ['NoticiasSearch' => ['estado' => '1']];
        if ($id) {
            $cat = Categorias::findOne(['alias' => $id]);
            $seach['NoticiasSearch']['idcategoria'] = $cat['idcategoria'];
        } elseif (!empty(Yii::$app->getRequest()->getQueryParam('cat'))) {
            $cat = Categorias::findOne(['idcategoria' => Yii::$app->getRequest()->getQueryParam('cat')]);
            $seach['NoticiasSearch']['idcategoria'] = Yii::$app->getRequest()->getQueryParam('cat');
        } else {
            $cat = new Categorias();
        }

        if (!empty(Yii::$app->getRequest()->getQueryParam('s')))
            $seach['NoticiasSearch']['titulo'] = Yii::$app->getRequest()->getQueryParam('s');

        $dataProvider = $searchModel->search($seach);
        $dataProvider->setSort([
            'defaultOrder' => ['idnoticia' => SORT_DESC]]);
        $dataProvider->query->distinct();
        $dataProvider->pagination->pageSize = 6;
        $dataProvider->pagination->forcePageParam = false;

        return $this->render('noticias', ['model' => $dataProvider, 'all' => true, 'categoria' => $cat]);
    }

    public function actionNoticia($id = null)
    {

        $model = Noticias::findOne(['idnoticia' => $id]);
        $cat = Categorias::findOne(['idcategoria' => Yii::$app->request->get('cat')]);
        return $this->render('noticias', ['model' => $model, 'categoria' => $cat]);
    }

    public function actionFaq()
    {
        $model = Faq::findAll(['estado' => 1]);
        return $this->render('faq', ['model' => $model]);
    }

    /*
     * anuncios functios
     */

    public function actionComprar()
    {
        $data['configuracion'] = Configuracion::find()->one();
        $data['modelSearch'] = new AnunciosSearch();
        $datos = Yii::$app->request->queryParams;
        $data['modelFiltro'] = array();
        if (isset($datos['filtro'])) {
            $data['modelFiltro'] = $datos['filtro'];
        }

        $data['modelSearch']['estado'] = 1;
        $data['data'] = $data['modelSearch']->search(Yii::$app->request->queryParams);
        $data['data']->setSort([
            'defaultOrder' => ['idanuncio' => SORT_DESC]]);
        $data['data']->query->distinct();
        $data['data']->pagination->pageSize = 9;
        return $this->render('anuncios', $data);//$filtro['idfiltro'];
    }

    public function actionItem($id = null)
    {
        $data['configuracion'] = Configuracion::find()->one();
        if (is_null($id))
            $data['model'] = new Anuncios();
        else {
            $data['model'] = Anuncios::findOne(['idanuncio' => $id]);
            $data['model']->visitas = (int)$data['model']->visitas + 1;
            $data['model']->save(false);
        }

        $data['configuracion']['titulo_pagina'] = $data['model']['titulo'];
        $data['configuracion']['resumen_pagina'] = HtmlPurifier::process($data['model']['decripcion']);
        return $this->render('anuncios/item', $data);
    }

    /*
     * funciones ventas
     */
    public function actionVender()
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['login']);
        }
        $page = Yii::$app->request->get('page');

        if ($page == 'comprar') {
            $anunciante = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
            if ($anunciante['tipo'] == 1) {
                $model = Paquetes::find()->where(['estado' => 1])->all();
                return $this->render('carrito/paquetes', [
                    'model' => $model,
                ]);
            } else {
                $model = Yii::$app->session->get('user');
                $model->fecha_registro = date('Y-m-d');
                $model->tipo = 1;
                if ($model->load(Yii::$app->request->post())) {
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $name = Yii::$app->security->generateRandomString();
                    if ($model->validate()) {
                        if ($model->upload($name)) {
                            $model->foto = $name . '.' . $model->file->extension;
                        }
                        if ($model->save()) {
                            Yii::$app->session->setFlash('success', ['message' => 'Registro realizado', 'type' => 'success']);
                            $this->refresh();
                        }
                    } else {
                        Yii::$app->session->setFlash('error', ['message' => 'Hubo un error, intentelo mas tarde']);
                    }
                }

                return $this->render('anunciante', [
                    'model' => $model,
                ]);
            }
        } elseif ($page == 'publicar') {
            $model = new Anuncios();

            if ($model->load(Yii::$app->request->post())) {
                $model->idusuario = Yii::$app->session->get('user')['idusuario'];
                $model->estado = 0;
                $model->enable = 0;
                $model->fecha_registro = date('Y-m-d H:i:s');
                $model->file = UploadedFile::getInstance($model, 'file');
                $name = Yii::$app->security->generateRandomString();
                if ($model->validate()) {
                    // form inputs are valid, do something here
                    if ($model->upload($name)) {
                        $model->foto = $name . '.' . $model->file->extension;
                    }
                    if ($model->save(false)) {
                        if (is_array($model['filtro'])) {
                            foreach ($model['filtro'] as $item) {
                                $tmp = new AnunciosFiltros();
                                $tmp->idanuncio = $model->idanuncio;
                                $tmp->idfiltro = $item;
                                $tmp->fecha_registro = date('Y-m-d H:i:s');
                                $tmp->save();
                            }
                        }
                        Yii::$app->session->setFlash('error', ['message' => 'Gracias por registrar su anuncio', 'type' => 'success']);
                        return $this->redirect(['vender', 'page' => 'publicar-galeria', 'id' => $model->idanuncio]);
                    } else {
                        if ($model->foto) {
                            if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto)) {
                                unlink(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto);
                            }
                        }
                    }
                }
            }

            return $this->render('publicar', [
                'model' => $model,
            ]);
        } elseif ($page == 'publicar-galeria') {
            $id = Yii::$app->request->get('id');
            if (empty($id)) {
                return $this->redirect(['vender', 'page' => 'publicar']);
            }

            return $this->render('anuncios/galeria', ['model' => new AnunciosGaleria(), 'id' => $id]);

        } else
            return $this->redirect(['vender', 'page' => 'comprar']);

    }

    public function actionUpload2()
    {
        $model = new AnunciosGaleria();

        $model->file = UploadedFile::getInstance($model, 'file');
        $name = Yii::$app->security->generateRandomString();
        if ($model->upload($name)) {
            $model->foto = $name . '.' . $model->file->extension;
            $model->fecha_registro = date('Y-m-d H:i:s');
            $model->idanuncio = Yii::$app->request->post('id');
            if ($model->save(false)) {
                Yii::$app->session->setFlash('error', ['message' => 'Se registro su galeria', 'type' => 'success']);
                return $this->redirect(['comprar']);
            }
        }
        var_dump($model->getErrors());
        die();
        return false;
    }

    public function actionCarrito($id)
    {
        if (empty($id)) {
            return $this->redirect(['site/vender']);
        }

        $paquete = Paquetes::findOne(['idpaquete' => $id]);
        /*$item = new Compra();
        $item->idpaquete = $paquete->idpaquete;
        $item->idusuario= Yii::$app->session->get('user')['idusuario'];
        $item->fecha_registro = date("Y-m-d H:i:s");
        $item->precio = $paquete->precio;*/
        Yii::$app->cart->removeAll();
        Yii::$app->cart->put($paquete, 1);
        return $this->redirect(Url::toRoute(['/carrito/index/']));
    }

    public function actionPages($id = null)
    {
        $data['contenido'] = Contenido::find()->where(['idcategoria' => Categorias::findOne(['alias' => $id])['idcategoria']])->one();
        return $this->render('contenido', $data);
    }

    /*
     * user funcions
     */
    public function actionLogin()
    {

        if (!empty(Yii::$app->session->get('user'))) {
            return $this->goHome();
        }

        $model = new LoginWeb();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->render('cuenta/login', ['model' => $model]);

    }


    public function actionLogout()
    {
        if (!empty(Yii::$app->session->get('user'))) {
            Yii::$app->session->remove('user');
            if (Yii::$app->request->referrer) {
                return $this->redirect(Yii::$app->request->referrer);
            } else {
                return $this->goHome();
            }
        }
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Usuarios();
        $model->fecha_registro = date('Y-m-d H:i:s');
        $model->estado = '1';
        $emailTmp = Yii::$app->getRequest()->getQueryParam('email');
        if (!empty($emailTmp))
            $model->email = Yii::$app->getRequest()->getQueryParam('email');
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if (!$model->exist()) {
                    $randomString = Yii::$app->getSecurity()->generateRandomString(8);
                    $model->contrasena = md5($randomString);

                    if ($model->save()) {
                        //$model->send();
                        Correos::nuevoUsuario($model, $randomString);
                        Yii::$app->session->setFlash('success', ['message' => 'Registro Realizado', 'type' => 'success']);
                        return $this->redirect(['site/login']);
                    }
                    Yii::$app->session->setFlash('error', ['message' => 'Hubo un error, intentelo mas tarde']);
                } else
                    Yii::$app->session->setFlash('error', ['message' => 'Correo ya registrado']);
            } else {
                Yii::$app->session->setFlash('error', ['message' => 'Se encontro algun error en el formulario']);
            }
        }
        return $this->render('cuenta/register', [
            'model' => $model,
        ]);
    }

    public function actionCuenta()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = Usuarios::find()->where(['idusuario' => Yii::$app->user->identity->getId()])->one();
        if (!empty($model)) {
            if ($model->load(Yii::$app->request->post())) {

                if ($model->validate()) {
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', ['message' => 'Registro Realizado', 'type' => 'success']);
                        return $this->refresh();
                    }
                    Yii::$app->session->setFlash('error', ['message' => 'Hubo un error, intentelo mas tarde']);
                }
            }
        }
        return $this->render('cuenta/register', [
            'model' => $model,
        ]);
    }

    public function actionDeseos()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        //$model = Deseos::find()->where(['idusuario'=>Yii::$app->user->identity->getId()])->all();
        $searchModel = new DeseosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['idusuario' => Yii::$app->user->identity->getId()]);
        return $this->render('cuenta/deseos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionDeseosDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        Deseos::deleteAll(['iddeseo' => $id]);
        return $this->redirect(['deseos']);
    }


    public function actionMapa($la, $lo)
    {
        return $this->renderAjax('mapa', ['coordgoogle' => $la . ',' . $lo]);
        //return $this->render('mapa',['coordgoogle'=>$la.','.$lo]);
    }

}
