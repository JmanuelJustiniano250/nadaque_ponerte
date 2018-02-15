<?php

namespace app\controllers;

use app\components\Correos;
use app\models\Anuncios;
use app\models\AnunciosFiltros;
use app\models\AnunciosGaleria;
use app\models\AnunciosSearch;
use app\models\CompraSearch;
use app\models\ContactForm;
use app\models\Forget;
use app\models\Newsletter;
use app\models\Usuarios;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class CuentaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

        ];
    }

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

    /**
     * Displays homepage.
     *
     * @return string
     */


    public function actionCreate()
    {

        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }

        $model = new Anuncios();


        if ($model->load(Yii::$app->request->post())) {
            $model->idusuario = Yii::$app->session->get('user')['idusuario'];
            $model->fecha_registro = date('Y-m-d H:i:s');
            $model->file = UploadedFile::getInstance($model, 'file');
            $name = Yii::$app->security->generateRandomString();
            if ($model->validate()) {
                // form inputs are valid, do something here
                if ($model->upload($name)) {
                    if ($model->foto) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto);
                        }
                    }
                    $model->foto = $name . '.' . $model->file->extension;
                }
                if ($model->save(false)) {
                    if (is_array($model['filtro'])) {
                        AnunciosFiltros::deleteAll(['idanuncio' => $model->idanuncio]);
                        foreach ($model['filtro'] as $item) {
                            $tmp = new AnunciosFiltros();
                            $tmp->idanuncio = $model->idanuncio;
                            $tmp->idfiltro = $item;
                            $tmp->fecha_registro = date('Y-m-d H:i:s');
                            $tmp->save();
                        }
                    }
                    Yii::$app->session->setFlash('success', ['message' => 'Anuncio Creado', 'type' => 'success']);
                } else {
                    if ($model->foto) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto);
                        }
                    }
                    Yii::$app->session->setFlash('success', ['message' => 'Hubo un error en la creacion del anuncio, Intentelo de nuevo mas tarde']);
                }
            }

        }


        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                return $this->redirect(['anuncios']);
            }

        } else {
            return $this->render('../anuncios/create', [
                'model' => $model,
            ]);
        }

    }


    public function actionPrincipal()
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', ['op' => 1, 'model' => $model]);
    }

    public function actionSuscribe()
    {
        $model = new Newsletter();
        if ($model->load(Yii::$app->request->post())) {
            $email = $model->email;
            $tmp = Newsletter::find()->where(['email' => $email])->count();
            if ($tmp > 0) {
                Yii::$app->session->setFlash('success', ['message' => 'Correo ya resgistrado']);
            } else {
                $model->fecha_registro = date('Y-m-d H:i:s');
                if ($model->save()) {
                    Correos::nuevoNewsletter($model);
                    Yii::$app->session->setFlash('success', ['message' => 'Registro Realizado', 'type' => 'success']);
                } else
                    Yii::$app->session->setFlash('success', ['message' => 'Hubo un error en el registro, intentelo mas tarde nuevamente']);
            }
        }
        $this->redirect(Yii::$app->request->referrer);
    }

    public function actionContacto()
    {
        $model = new ContactForm();
        $model['subject'] = 'Formulario de Contacto';
        if ($model->load(Yii::$app->request->post())) {
            if (Correos::contact($model)) {
                Yii::$app->session->setFlash('success', ['message' => 'Mensaje enviado', 'type' => 'success']);
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', ['message' => 'Algunos datos estan incompletos']);
            }
        } else {
            Yii::$app->session->setFlash('success', ['message' => 'Algunos datos estan incompletos"']);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionForget()
    {

        if (!empty(Yii::$app->session->get('user'))) {
            return $this->goHome();
        }

        $model = new Forget();
        if ($model->load(Yii::$app->request->post())) {
            $user = Usuarios::findOne(['email' => $model->email]);
            if ($user) {
                $randomString = Yii::$app->getSecurity()->generateRandomString(6);
                $user['contrasena'] = md5($randomString);
                if ($user->save()) {
                    Correos::recoveryPass($model, $randomString);
                    Yii::$app->session->setFlash('success', ['message' => 'Correo enviado', 'type' => 'success']);
                    return $this->redirect(['site/login']);
                } else
                    Yii::$app->session->setFlash('error', ['message' => 'Error en el envio, intentelo mas tarde']);
            } else {
                Yii::$app->session->setFlash('error', ['message' => 'Correo no registrado']);
            }
            return $this->refresh();
        }
        return $this->render('forget', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {

        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }

        $model = new Usuarios();
        $model->fecha_registro = date('Y-m-d H:i:s');
        $model->estado = '1';
        if (!empty(Yii::$app->getRequest()->getQueryParam('email')))
            $model->email = Yii::$app->getRequest()->getQueryParam('email');
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if (Yii::$app->session->get('user')['contrasena'] != md5($model->contrasena))
                    $model->contrasena = md5($model->contrasena);

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', ['message' => 'Registro Realizado', 'type' => 'success']);
                    return $this->refresh();
                }
                Yii::$app->session->setFlash('error', ['message' => 'Hubo un error, intentelo mas tarde']);
            }
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionCuenta()
    {

        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }

        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['id']]);
        $model->fecha_nacimiento =  date($model['ano'].'-'.$model['mes'].'-'.$model['dia']);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->contrasena != Yii::$app->session->get('user')['contrasena'])
                    $model->contrasena = md5($model->contrasena);
                if ($model->save()) {



                    Yii::$app->session->setFlash('success', ['message' => 'actualizacion Realizada', 'type' => 'success']);
                } else {
                    Yii::$app->session->setFlash('success', ['message' => 'Hubo un error en la actualizacion, Intentelo de nuevo mas tarde']);
                }
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUpload()
    {
        if (Yii::$app->request->post('id')) {
            $model = Usuarios::findOne(['idusuario' => Yii::$app->request->post('id')]);
            $model->file = UploadedFile::getInstance($model, 'file');
            $name = Yii::$app->security->generateRandomString();
            if ($model->upload($name)) {
                if (file_exists("../" . Yii::$app->basePath . "/imagen/usuarios/" . $model->foto)) {
                    unlink("../" . Yii::$app->basePath . "/imagen/usuarios/" . $model->foto);
                }
                $model->foto = $name . '.' . $model->file->extension;
                if ($model->save(false)) {
                    return true;
                }
            }
        }
        var_dump($model->getErrors());
        die();
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
                return true;
            }
        }
        var_dump($model->getErrors());
        die();
        return false;
    }

    public function actionDelete()
    {
        $model = new AnunciosGaleria();

        $id = Yii::$app->request->post('key');
        $model = $model->findOne(['idgaleria' => $id]);
        if (empty($model->attributes)) {
            return false;
        }
        $idp = $model->idanuncio;
        $url = "/imagen/anuncios/" . $model->foto;
        $url = Yii::$app->basePath . $url;
        //$url=str_replace($model->archivo,'@web','@webroot');
        if ($model->delete()) {
            unlink($url);
            return true;
        }
        return false;
    }

    public function actionAnuncios()
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }
        $searchModel = new AnunciosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        $dataProvider->pagination->pageSize = 10;
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', [
            'op' => 6,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }


    public function actionAnuncios2()
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }
        $searchModel = new AnunciosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        $dataProvider->pagination->pageSize = 10;
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', [
            'op' => 2,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionCompras()
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        $dataProvider->pagination->pageSize = 10;
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', [
            'op' => 4,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }


    public function actionCalificaciones()
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', ['op' => 3, 'model' => $model]);
    }


    public function actionUpdate($id = null)
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }
        if (is_null($id)) {
            $this->redirect(['cuenta/anuncios']);
        }
        // $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        $model = Anuncios::find()->where(['idanuncio' => $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $model->fecha_registro = date('Y-m-d H:i:s');
            $model->file = UploadedFile::getInstance($model, 'file');
            $name = Yii::$app->security->generateRandomString();
            if ($model->validate()) {
                // form inputs are valid, do something here
                if ($model->upload($name)) {
                    if ($model->foto) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto);
                        }
                    }
                    $model->foto = $name . '.' . $model->file->extension;
                }
                if ($model->save(false)) {
                    if (is_array($model['filtro'])) {
                        AnunciosFiltros::deleteAll(['idanuncio' => $model->idanuncio]);
                        foreach ($model['filtro'] as $item) {
                            $tmp = new AnunciosFiltros();
                            $tmp->idanuncio = $model->idanuncio;
                            $tmp->idfiltro = $item;
                            $tmp->fecha_registro = date('Y-m-d H:i:s');
                            $tmp->save();
                        }
                    }
                    Yii::$app->session->setFlash('success', ['message' => 'actualizacion Realizada', 'type' => 'success']);
                } else {
                    if ($model->foto) {
                        if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto)) {
                            unlink(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto);
                        }
                    }
                    Yii::$app->session->setFlash('success', ['message' => 'Hubo un error en la actualizacion, Intentelo de nuevo mas tarde']);
                }
            }

        }


        if ($model->load(Yii::$app->request->post())) {
            $model->idusuario = Yii::$app->session->get('user')['idusuario'];

            if ($model->save()) {

                return $this->redirect(['anuncios']);
            }


        } else {
            return $this->render('../anuncios/update', [
                'model' => $model,
            ]);
        }


    }


}
