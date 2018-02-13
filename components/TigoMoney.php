<?php

namespace app\components;

use app\models\Detallecarrito;
use app\models\Productos;
use Yii;
use yii\base\Component;
use yii\helpers\Url;

class TigoMoney extends Component
{
    var $carrito;
    var $usuario;
    var $mensaje;


    var $razon_social = " Jilmar R. Zubieta Arancibia";
    var $nit = "6906672014";

    //prod
    var $llaveIdentificacion = 'cbdb7af2245ab2391932622685512f4c856630b237fb6ccecb8cbeb64d6b8931ac0640ee18181ad2a181d337317e4c59a2fb8cc936c92bbe3a39a6ff7321a993';
    var $llaveEncriptacion = 'YJZL3LJTFBG3Q5SJ20S6G8L3';
    var $url = 'https://pasarela.tigomoney.com.bo/PasarelaServices/CustomerServices?wsdl';

    //dev
    //var $llaveIdentificacion = 'c858bb072170089d66e525109f76594430d84dd1068f53cb6fb7e04eb01cdca935b52a1134d88a8712999514b9a1471181de8ab38f6ba61a2fedd7a195ba59ec';
    //var $llaveEncriptacion = 'JMY4NFSRJWZKRKEM6DWQZNKY';
    //var $url = 'http://190.129.208.178:96/PasarelaServices/CustomerServices?wsdl';

    //var $error = array("");

    public function __construct($llaveIdentificacion = null, $llaveEncriptacion = null, $url = null)
    {
        if (!is_null($llaveIdentificacion))
            $this->llaveIdentificacion = $llaveIdentificacion;
        if (!is_null($llaveEncriptacion))
            $this->llaveEncriptacion = $llaveEncriptacion;
        if (!is_null($url))
            $this->url = $url;
    }

    private function volcado($model)
    {
        $productos_array = "";
        $tmp = Detallecarrito::find()->where(['idcarrito' => $this->carrito->idcarrito])->count();
        if ($tmp > 0) {
            Detallecarrito::deleteAll(['idcarrito' => $this->carrito->idcarrito]);
        }
        foreach (Yii::$app->cart->positions as $item) {

            $item->idcarrito = $this->carrito->idcarrito;
            $item->cantidad = $item->quantity;
            $item->subtotal = $item->getCost();
            $item->save();
            $productos_array .= "*i" . 1 . "|" . $item->quantity . "|" . $item->producto['titulo'] . "|" . $item->precio . "|" . $item->getCost();

        }


        $this->mensaje = "pv_nroDocumento=" . $this->carrito->nit . ";" .
            "pv_linea=" . $model->numero . ";" .
            "pv_monto=" . Yii::$app->cart->getCost() . ";" .
            "pv_orderId=" . $this->carrito->idcarrito . ";" .
            "pv_nombre=" . $this->usuario->nombre . ";" .
            "pv_confirmacion= " . $this->razon_social . ";" .
            //"pv_notificacion= a {$razon_social} Codigo:" . ($this->usuario->idusuario + $this->carrito->idcarrito + $this->carrito->nit) . ";" .
            "pv_notificacion= a {$this->razon_social};" .
            "pv_urlCorrecto=" . Url::to(['carrito/exito']) . ";" .
            "pv_urlError=" . Url::to(['carrito/error']) . ";" .
            "pv_items=" . $productos_array . ";" .
            "pv_razonSocial=" . $this->razon_social . ";" .
            "pv_nit=" . $this->nit;
    }

    private function email()
    {

    }

    public function error($codigo)
    {
        $error = array(
            "0" => 'Estimado cliente tu transaccion no pudo ser completada, por favor intenta nuevamente.',
            //'1'=>'Estimado cliente tu transaccion no pudo ser completada, por favor intenta nuevamente.',
            '4' => 'Comercio no Habilitado para el pago con Tigo Money',
            '7' => 'Acceso denegado por favor intenta nuevamente verificando los datos ingresados.',
            '8' => 'El PIN ingresado es inválido, si olvidaste tu pin, llama al *555 o contáctate con soporte directamente desde la App Tigo Money, si tu saldo es mayor a Bs 313, debes pasar por un of. Tigo con tu carnet',
            '11' => 'Tiempo agotado, por favor inicia nuevamente la transaccion',
            '14' => 'Cuenta no habilitada con Tigo Money, regístrate marcando *555# o descarga la App Tigo Money a tu celular. Mas info llama al *555, o contáctate con soporte directamente desde la App Tigo Money',
            '17' => 'El monto solicitado no es válido. Verifica los datos ingresados.',
            '19' => 'Comercio no Habilitado para el pago con Tigo Money',
            '16' => 'Cuenta Tigo Money suspendida, por favor comunícate al *555, o contáctate con soporte directamente desde la App Tigo Money',
            '23' => 'El monto solicitado es inferior al requerido, por favor verifica los datos ingresados.',
            '24' => 'El monto solicitado es superior al requerido, por favor verifica los datos ingresados.',
            '1001' => 'Tu saldo es insuficiente para completar la transaccion, carga tu cuenta desde la web de tu banco, desde un cajero Tigo Money ó desde un Punto más cercano a ti, marcando *555# o ingresando a la App Tigo Money.',
            '1002' => 'Ingresa a Completa tu transaccion desde la App Tigo Money o marcando *555#, Si olvidaste tu PIN, llama al *555, o contáctate con soporte directamente desde la App Tigo Money. Si tu saldo es mayor a Bs 313, debes pasar por un of. Tigo con tu carnet',
            '1004' => 'Estimado cliente, llegaste al límite maximo para realizar transacciones, para consultas por favor llama al *555, o contáctate con soporte directamente desde la App Tigo Money. También puedes pasar por una Of. Tigo con tu Carnet.',
            '1012' => 'Estimado Cliente excediste el límite de intentos para introducir tu PIN, por favor comunícate con el *555 para solicitar nuevo PIN, o contáctate con soporte directamente desde la App Tigo Money, si tu saldo es mayor a Bs 313, debes pasar por una of. Tigo con tu Carnet.',
            '560' => 'Estimado cliente tu transaccion no pudo ser completada, por favor intenta nuevamente.',
            '9999' => 'Estimado cliente tu transaccion no pudo ser completada, por favor intenta nuevamente.',
            '39' => 'Estimado cliente tu transaccion no pudo ser completada, por favor intenta nuevamente.',

        );
        if (array_key_exists($codigo, $error)) {
            return $error[$codigo];
        }
        return $error['9999'];
    }

    public function pago($carrito, $numero, $usuario, $test = false)
    {
        $this->carrito = $carrito;
        $this->usuario = $usuario;

        $this->volcado($numero);

        //encriptacion
        $tripleDes = new CTripleDes();
        $tripleDes->setMessage($this->mensaje);
        $tripleDes->setPrivateKey($this->llaveEncriptacion);
        $mensajeEncriptado = $tripleDes->encrypt();

//llamada el WS
        $result = "";
        if (!empty($mensajeEncriptado)) {
            $client = new \mongosoft\soapclient\Client([
                'url' => $this->url,
            ]);
            $parametro = array(
                'key' => $this->llaveIdentificacion,
                'parametros' => $mensajeEncriptado
            );
            try {
                $result = $client->solicitarPago($parametro);
            } catch (\Exception $exception) {
                return "-1";
            }

        } else {
            return "-1";
        }


        if (!empty($result)) {
// desencriptacion
            $tripleDes2 = new CTripleDes();
            $tripleDes2->setMessage_to_decrypt($result->return);
            $tripleDes2->setPrivateKey($this->llaveEncriptacion);
            $decrypt = $tripleDes2->decrypt();

            $query = $decrypt;
            parse_str($query, $get_array);

            /*if($test){
                return $query;
            }*/
            /*$arr = array_slice($get_array, 0, count($get_array), true);
            $arr2 = array();

            foreach ($arr as $key => $value) {
                if ($key === 'codRes') {
                    $arr2[$key] = (int)$value;
                } else
                    if ($key === 'orderId') {

                        $arr2[$key] = (int)$value;
                    } else
                        if ($key === 'transaccion') {

                            $arr2[$key] = (int)$value;
                        } else
                            $arr2[$key] = $value;
            }*/
            if (isset($get_array['codRes']))
                return (int)$get_array['codRes'];
            else {
                return "-1";
            }
        } else {
            return "-1";
        }

    }

    public function saveInventario()
    {
        $items = array();
        if ($this->carrito->items)
            $items = $this->carrito->items;

        Productos::saveInventario($items, $this->carrito->idcarrito);

    }
}
