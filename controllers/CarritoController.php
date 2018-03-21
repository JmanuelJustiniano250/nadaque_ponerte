<?php

namespace app\controllers;

use app\components\Sintesis;
use app\components\TigoMoney;
use app\models\Compra;
use app\models\Configuracion;
use app\models\Paquetes;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CarritoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data['configuracion'] = Configuracion::find()->one();
        return $this->render('index', $data);
    }

    public function actionLista()
    {
        if (!Yii::$app->session->has('user')) {
            return $this->redirect(['site/login']);
        }
        $data['configuracion'] = Configuracion::find()->one();
        return $this->render('lista', $data);
    }

    public function actionPasos($pasos = null)
    {
        if (!Yii::$app->session->has('user')) {
            return $this->redirect(['site/login']);
        }
        if (!Yii::$app->session->has('cart')) {
            Yii::$app->session->set('cart', Yii::$app->getSecurity()->generateRandomString(16) . Yii::$app->cart->getHash());
        }

        $model = Compra::find()
            ->where([
                'idusuario' => Yii::$app->session->get('user')['idusuario'],
                'session' => Yii::$app->session->get('cart'),
            ])
            ->one();
        if (Yii::$app->request->get('car')) {
            $model = Compra::find()
                ->where(['session' => Yii::$app->request->get('car'),])
                ->one();
        }
        //$tmp = Yii::$app->session->getId();
        if (empty($model)) {
            $model = new Compra();
        }
        if (($pasos != '1') && (empty($model['nit']) || empty($model['razon_social']))) {
            $pasos = '1';
        }
        if (Yii::$app->cart->getCount() == 0) {
            return $this->redirect(['carrito/index']);
        }

        if ($model->estado == 1) {
            Yii::$app->session->setFlash('mensaje', ['message' => 'Gracias por tu compra, en breve te llegará un correo confirmando la correcta recepción del pago', 'type' => 'success']);
            //Yii::$app->session->setFlash('mensaje',['message'=>$res,'type'=>'success']);
            $pasos = 'final';
        }
        if ($pasos == 'final') {
            if ($model->isNewRecord) {
                $pasos = '1';
            } else {
                if ($model->estado == 0) {
                    $pasos = '2';
                }
            }
        }
        switch ($pasos) {
            case '1':
                if ($model->load(Yii::$app->request->post())) {
                    $model->idusuario = Yii::$app->session->get('user')['idusuario'];
                    $model->session = Yii::$app->session->get('cart');
                    $model->estado = 0;
                    if($model->nit_factura)
                        $model->nit_factura = Yii::$app->session->get('user')['nit'];
                    if($model->nombre_factura)
                        $model->nombre_factura = Yii::$app->session->get('user')['nombrenit'];

                    if (Yii::$app->cart->getCost() == 0) {
                        $model->estado = 1;
                        $model->fecha_pago = date('Y-m-d H:i:s');
                        foreach (Yii::$app->cart->positions as $item) {
                            $model->idpaquete = $item->idpaquete;
                        }
                    }
                    if ($model->save()) {
                        if ($model->estado)
                            return $this->redirect(Url::to(['carrito/pasos', 'pasos' => 'final']));
                        return $this->redirect(Url::to(['carrito/pasos', 'pasos' => '2']));
                    }
                }
                return $this->render('paso1', ['model' => $model]);
                break;
            case '2':
                if ($model->load(Yii::$app->request->post())) {
                    //$model->tipo_carro = 1;
                    if ($model->save())
                        return $this->redirect(Url::to(['carrito/pasos', 'pasos' => '3']));
                }
                return $this->render('paso2', ['model' => $model]);
                break;
            case '3':

                switch ($model->tipo_pago) {
                    case "1" :
                        $tigo = new Tigo();
                        if ($tigo->load(Yii::$app->request->post())) {
                            $tmp = new TigoMoney();
                            $res = $tmp->pago($model, $tigo, Yii::$app->session->get('user'));
                            if ($res == 0) {
                                $model->estado = 1;
                                if ($model->save()) {
                                    $tmp->saveInventario();
                                    //$model->send(Yii::$app->session->get('user')['email']);
                                }
                                Yii::$app->session->setFlash('mensaje', ['message' => 'Gracias por tu compra, en breve te llegará un correo confirmando la correcta recepción del pago', 'type' => 'success']);
                                return $this->redirect(Url::to(['carrito/pasos', 'pasos' => 'final']));
                            } else {
                                Yii::$app->session->setFlash('mensaje', ['message' => $tmp->error($res)]);
                                return $this->redirect(Url::to(['carrito/pasos', 'pasos' => '2']));
                            }
                        }
                        return $this->render('tigo', ['model' => $tigo]);
                        break;
                    case "2" :
                        $tmp = new Sintesis();
                        $res = $tmp->pagosNet($model, Yii::$app->session->get('user'));
                        if ($res != null) {
                            $model->estado = 2;
                            if ($model->save()) {
                                $tmp->saveInventario();
                                $model->reserva(Yii::$app->session->get('user')['email']);
                            }
                            Yii::$app->session->setFlash('mensaje', ['message' => 'Gracias por tu compra, en breve te llegará un correo confirmando la correcta recepción del pago', 'type' => 'success']);
                            return $this->redirect(Url::to(['carrito/pasos', 'pasos' => 'final']));
                        } else {
                            Yii::$app->session->setFlash('mensaje', ['message' => $tmp->mensaje]);
                            return $this->redirect(Url::to(['carrito/pasos', 'pasos' => '2']));
                        }
                        break;
                    case "3" :
                        $tmp = new Sintesis();
                        $res = $tmp->tarjetas($model, Yii::$app->session->get('user'));
                        if ($res != null) {
                            $model->estado = 2;
                            if ($model->save()) {
                                $tmp->saveInventario();
                                $model->reserva(Yii::$app->session->get('user')['email']);
                            }
                            $data['configuracion'] = Configuracion::find()->one();
                            $data['model'] = $model;
                            $data['url'] = $res;
                            return $this->render('final', $data);
                        } else {
                            Yii::$app->session->setFlash('mensaje', ['message' => $tmp->mensaje]);
                            return $this->redirect(Url::to(['carrito/pasos', 'pasos' => '2']));
                        }
                        break;
                }
                break;
            case 'final':
                Yii::$app->cart->removeAll();
                $data['configuracion'] = Configuracion::find()->one();
                $data['model'] = $model;
                if (Yii::$app->session->has('cart')) {
                    Yii::$app->session->remove('cart');
                }
                return $this->render('final', $data);
                break;
            default:
                return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionAdd($id)
    {
        //$cart = new ShoppingCart();
        $m_prod = Productos::find()->where(['idproducto' => $id])->one();
        if (!empty($m_prod)) {
            $cart = Yii::$app->cart;
            $model = new DetalleCompra();
            $model->idproducto = $id;

            $val = true;
            $time = new \DateTime('now');
            $today = $time->format('Ymd');
            $cantidad = [];


            $m_prom = $m_prod->promocion;
            $model->precio = $m_prod->precio;
            if ($m_prom) {
                $tmp = date('Ymd', strtotime($m_prom['fechafinal']));
                if ($tmp >= $today) {
                    $model->precio = $m_prom['precio'];

                }
            }

            if (!empty($m_prod->tallas)) {
                if (Yii::$app->request->get('talla'))
                    $model->idtalla = Yii::$app->request->get('talla');
                else {
                    Yii::$app->session->setFlash('mensaje', ['message' => 'Elija una Talla por favor']);
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }

            $cnt = Yii::$app->request->get('cantidad');
            if (empty($cnt)) {
                $cnt = 1;
            }

            if (!empty($model->talla)) {
                $tmp_cnt = $m_prod->getCantidad($model->idtalla);
                if (!empty($tmp_cnt)) {
                    $cart_tmp = $cart->getPositionById($model->idproducto . '-' . $model->idtalla);
                    $tmp_cnt['saldo'] -= (isset($cart_tmp->quantity)) ? $cart_tmp->quantity : 0;
                    if (($tmp_cnt['saldo']) < $cnt) {
                        Yii::$app->session->setFlash('mensaje', ['message' => 'No hay tantos insumos disponibles']);
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                } else {
                    Yii::$app->session->setFlash('mensaje', ['message' => 'No hay insumos disponibles']);
                    return $this->redirect(Yii::$app->request->referrer);
                }

            } else {
                $tmp_cnt = $m_prod->getCantidad();
                if (!empty($tmp_cnt)) {
                    $cart_tmp = $cart->getPositionById($model->idproducto);
                    $tmp_cnt['saldo'] -= (isset($cart_tmp->quantity)) ? $cart_tmp->quantity : 0;
                    if (($tmp_cnt['saldo']) < $cnt) {
                        Yii::$app->session->setFlash('mensaje', ['message' => 'No hay tantos insumos disponibles']);
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                }
            }
            $cart->put($model, $cnt);

            Yii::$app->session->setFlash('addcarrito', $m_prod);
            //return $this->redirect(['index']);
            return $this->redirect(Yii::$app->request->referrer);
        }

        throw new NotFoundHttpException();
        //return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRemove($id)
    {
        //$cart = new ShoppingCart();
        $cart = Yii::$app->cart;
        $model = Paquetes::findOne($id);
        if ($model) {
            $cart->remove($model);
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException();
        //return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionErase()
    {
        //$cart = new ShoppingCart();
        $cart = Yii::$app->cart;
        $cart->removeAll();
        return $this->redirect(['index']);
    }

    public function actionError($id = null)
    {
        return true;
    }

    public function actionExito($id = null)
    {
        //$cart = new ShoppingCart();
        if ($id) {
            $model = Compra::findOne(['idcarrito' => $id]);
            $model->estado = 1;
            $model->save();
            //Yii::$app->session->setFlash('mensaje',['message'=>'Gracias por su Compra','type'=>'success']);
            $cart = Yii::$app->cart;
            $cart->removeAll();
        }

        return true;
    }


    /*public function actionAdeseo($id)
    {
        $model = Productos::findOne($id);
        if ($model) {
            Yii::$app->session->setFlash('mensaje', ['menssage'=>'lista de deseo']);
            $deseo = Carrito::
            //return $this->redirect(['index']);
            return $this->redirect(Yii::$app->request->referrer);
        }
        throw new NotFoundHttpException();
        //return $this->redirect(Yii::$app->request->referrer);
    }*/

}
