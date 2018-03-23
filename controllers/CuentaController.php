<?php

namespace app\controllers;

use app\components\Correos;
use app\models\Anuncios;
use app\models\AnunciosFiltros;
use app\models\AnunciosGaleria;
use app\models\AnunciosSearch;
use app\models\Calificaciones;
use app\models\CompraSearch;
use app\models\ContactForm;
use app\models\Deseo;
use app\models\Forget;
use app\models\Mensajes;
use app\models\Newsletter;
use app\models\Usuarios;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'principal', 'register', 'cuenta', 'anuncios', 'anuncios2', 'compras', 'calificaciones', 'calificar', 'comentarios', 'listadeseos','listadel', 'mensajeria', 'update', 'mensaje'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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


    public function actionCreate($id=null)
    {

        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/

        $model = new Anuncios();
        $modelfiltro = new AnunciosFiltros();


        if ($model->load(Yii::$app->request->post()) && $modelfiltro->load(Yii::$app->request->post())) {
            $model->idusuario = Yii::$app->session->get('user')['idusuario'];
            $model->fecha_registro = date('Y-m-d H:i:s');
            $model->razon = "";
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file2 = UploadedFile::getInstance($model, 'file2');
            $model->file3 = UploadedFile::getInstance($model, 'file3');
            $model->file4 = UploadedFile::getInstance($model, 'file4');
            $model->file5 = UploadedFile::getInstance($model, 'file5');
            // form inputs are valid, do something here
            if ($model->upload()) {

            }
            if ($model->save(false)) {
                $modelfiltro->idanuncio = $model->idanuncio;
                $modelfiltro->save();
                Yii::$app->session->setFlash('success', ['message' => 'Tu anuncio ha sido recibido con éxito y está en proceso de aprobación. Te responderemos por correo máximo en 24 horas si tu anuncio está aprobado o necesitas hacerle algún cambio.', 'type' => 'success']);
                return $this->redirect(['cuenta/anuncios2']);
            } else {
                if ($model->foto) {
                    if (file_exists(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto)) {
                        unlink(Yii::$app->basePath . "/imagen/anuncios/" . $model->foto);
                    }
                }
                Yii::$app->session->setFlash('success', ['message' => 'Hubo un error en la creacion del anuncio, Intentelo de nuevo mas tarde']);
            }

        }

        if(!is_null($id))
        {
            $model = Anuncios::find()->where(['idanuncio'=>$id])->one();
            $modelfiltro = AnunciosFiltros::find()->where(['idanuncio'=>$id])->one();
            if(empty($modelfiltro))
                $modelfiltro= new AnunciosFiltros();
        }

        return $this->render('../anuncios/create', [
            'model' => $model,
            'filtro' => $modelfiltro,
        ]);

    }


    public function actionPrincipal()
    {
        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', ['op' => 1, 'model' => $model]);
    }


    public function actionChangepassword()
    {
        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        if($model->load(Yii::$app->request->post()))
        {
            if(!empty($model->contrasena2)) {
                if ($model->contrasena != Yii::$app->session->get('user')['contrasena']) {
                if (md5($model->contrasena) != Yii::$app->session->get('user')['contrasena']) {
                    $model->contrasena = md5($model->contrasena);
                    if($model->save(false))
                        Yii::$app->session->setFlash('success', ['message' => 'contraseña Actualizada','type'=>'success']);
                    else
                        Yii::$app->session->setFlash('success', ['message' => 'Hubo un error al actualizar los datos, intentelo mas tarde']);
                }
                }
            }
            else{
                $model->addError('contrasena2','empty');
            }
        }
        return $this->render('index', ['op' => 9, 'model' => $model]);
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

        /*if (!empty(Yii::$app->session->get('user'))) {
            return $this->goHome();
        }*/

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

        /* if (empty(Yii::$app->session->get('user'))) {
             return $this->redirect(['site/login']);
         }*/

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

        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/

        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['id']]);
        /* $model->fecha_nacimiento =  date($model['ano'].'-'.$model['mes'].'-'.$model['dia']);*/
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $name = Yii::$app->security->generateRandomString();
                if ($model->upload($name)) {
                    $tmp = $model->foto;
                    $model->foto = $name . '.' . $model->file->extension;

                }
                if ($model->contrasena != Yii::$app->session->get('user')['contrasena'])
                    $model->contrasena = md5($model->contrasena);
                if ($model->save(false)) {

                    if (file_exists("../" . Yii::$app->basePath . "/imagen/usuarios/" . $tmp)) {
                        unlink("../" . Yii::$app->basePath . "/imagen/usuarios/" . $tmp);
                    }
                    Yii::$app->session->setFlash('success', ['message' => 'Actualización Realizada', 'type' => 'success']);
                } else {
                    unlink("../" . Yii::$app->basePath . "/imagen/usuarios/" . $model->foto);
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

                return $this->redirect(['anuncios2']);
                //return true;

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
        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/
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
        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/
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
        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/
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
        $mensajes = Calificaciones::updateAll(['estado'=>1],['idvendedor' => Yii::$app->session->get('user')['idusuario']]);

        return $this->render('index', ['op' => 3, 'model' => $model]);
    }


    public function actionCalificar()
    {
        if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }
        $model = new Calificaciones();
        $model->idusuario = Yii::$app->session->get('user')['idusuario'];
        $model->fecha_creacion = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {
            if ($model->idusuario != $model->idvendedor) {
                $model->puntaje = round($model->puntaje);
                if ($model->save()) {
                    Correos::nuevaCalificacion(Yii::$app->session->get('user'));
                    Yii::$app->session->setFlash('success', ['message' => 'Calificación Realizada', 'type' => 'success']);
                } else {
                    Yii::$app->session->setFlash('success', ['message' => 'Hubo un error en la actualizacion, Intentelo de nuevo mas tarde']);
                }
            }
        }
        $this->redirect(Yii::$app->request->referrer);
    }


    public function actionComentarios()
    {
        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', ['op' => 4, 'model' => $model]);
    }


    public function actionListadeseos()
    {
        /* if (empty(Yii::$app->session->get('user'))) {
             return $this->redirect(['site/login']);
         }*/
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        return $this->render('index', ['op' => 8, 'model' => $model]);
    }
    public function actionListadel($id)
    {
        /* if (empty(Yii::$app->session->get('user'))) {
             return $this->redirect(['site/login']);
         }*/
        $model = Deseo::findOne(['iddeseo'=>$id]);
        $model->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionMensajeria()
    {
        /*if (empty(Yii::$app->session->get('user'))) {
            return $this->redirect(['site/login']);
        }*/
        $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        /* if($model['tipo']){*/
        $mensajestmp = Mensajes::find()
            ->andWhere(['or',
                    ['idusuario' => Yii::$app->session->get('user')['idusuario']],
                    ['idvendedor' => Yii::$app->session->get('user')['idusuario']]
            ])
            ->andWhere(['tipo' => 0])
            //->orderBy(['idmensaje' => SORT_DESC])
            ->distinct('idusuario')
            ->select(['idusuario','idvendedor'])
            ->all();
        $mensajes = Usuarios::find()->where(['and',
            ['IN', 'idusuario', ArrayHelper::getColumn($mensajestmp,'idusuario')],
            ['IN', 'idusuario', ArrayHelper::getColumn($mensajestmp,'idvendedor')]
            ])
        ->distinct('idusuario')
        ->all();
        /* $chat = Mensajes::find()
             ->andWhere(['idvendedor' => Yii::$app->session->get('user')['idusuario']])
             ->andWhere(['idusuario' => Yii::$app->request->get('id')])
             ->andWhere(['tipo' => 0])
             ->all();
     }
     else{*/
        /*$mensajes = Mensajes::find()
            ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
            ->andWhere(['tipo' => 0])
            ->distinct('idvendedor')
            ->all();*/
        $chat = Mensajes::find()
            ->andWhere(['or',
                    ['and',
                        ['idvendedor' => Yii::$app->request->get('id')],
                        ['idusuario' => Yii::$app->session->get('user')['idusuario']]
                    ]
                    ,
                    ['and',
                        ['idusuario' => Yii::$app->request->get('id')],
                        ['idvendedor' => Yii::$app->session->get('user')['idusuario']]
                    ]
                ])
            ->andWhere(['tipo' => 0])
            ->orderBy(['fecha_registro' => SORT_ASC])
            ->all();
        Mensajes::updateAll(['estado'=>1],['and',
            ['and',
                ['idvendedor' => Yii::$app->session->get('user')['idusuario']],
                ['tipo' => 0]
            ],['estado' => 0]]);
        // }

        return $this->render('index', ['op' => 7, 'model' => $model, 'mensaje' => $mensajes, 'chat' => $chat]);
    }

    public function actionUpdate($id = null)
    {
        /* if (empty(Yii::$app->session->get('user'))) {
             return $this->redirect(['site/login']);
         }*/
        if (is_null($id)) {
            $this->redirect(['cuenta/anuncios']);
        }
        // $model = Usuarios::findOne(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
        $model = Anuncios::find()->where(['idanuncio' => $id])->one();
        $modelfiltro = AnunciosFiltros::find()->where(['idanuncio' => $id])->one();
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
                    $modelfiltro->save();
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
                'filtro' => $modelfiltro,
                'model' => $model,
            ]);
        }

    }

    public function actionUpdateA($id)
    {
        $vendido = Yii::$app->request->get('estado');
        $precio = Yii::$app->request->get('precio');
        $precio_oferta = Yii::$app->request->get('precio-oferta');
        $model=Anuncios::findOne(['idanuncio'=>$id]);
        if(!empty($model)){
            $sw=0;
        if($vendido){
            $model->estado=6;
            $sw=1;
        }
        if(!empty($precio))
        {
            $model->precio=$precio;
            $sw=1;
        }
        if(!empty($precio_oferta))
        {
            $model->precio_promocion =$precio_oferta;
            $sw=1;
        }
            if ($sw==1) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', ['message' => 'Comentario enviado', 'type' => 'success']);
            } else
                Yii::$app->session->setFlash('error', ['message' => 'Error en el envio, intentelo mas tarde']);
        }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionMensaje()
    {

        if (empty(Yii::$app->session->get('user'))) {
            return $this->goHome();
        }

        $model = new Mensajes();
        if ($model->load(Yii::$app->request->post())) {
            $model->idusuario = Yii::$app->session->get('user')['idusuario'];
            $model->fecha_registro = date('Y-m-d H:i:s');
            $model->estado = 0;
            if ($model->save()) {
                    Correos::nuevoComentario(Yii::$app->session->get('user'));
                Yii::$app->session->setFlash('success', ['message' => 'Comentario enviado', 'type' => 'success']);
            } else
                Yii::$app->session->setFlash('error', ['message' => 'Error en el envio, intentelo mas tarde']);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }



    public function actionMensaje2()
    {

        if (empty(Yii::$app->session->get('user'))) {
            return $this->goHome();
        }

        $model = new Mensajes();
        if ($model->load(Yii::$app->request->post())) {
            $model->idusuario = Yii::$app->session->get('user')['idusuario'];
            $model->fecha_registro = date('Y-m-d H:i:s');
            $model->estado = 0;
            if ($model->save()) {
                    Correos::nuevoMensaje(Yii::$app->session->get('user'));
                Yii::$app->session->setFlash('success', ['message' => 'Mensaje enviado', 'type' => 'success']);
            } else
                Yii::$app->session->setFlash('error', ['message' => 'Error en el envio, intentelo mas tarde']);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }





    public function actionPublicargaleria()
    {
        $id = Yii::$app->request->get('id');
        $model = Anuncios::find()->where(['idanuncio' => $id])->one();
        if (empty($id)) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->idusuario = Yii::$app->session->get('user')['idusuario'];

            if ($model->save()) {

                return $this->redirect(['anuncios2']);
            }


        } else {
            return $this->render('../site/anuncios/galeria', ['model' => new AnunciosGaleria(), 'id' => $id]);
        }



    }
}
