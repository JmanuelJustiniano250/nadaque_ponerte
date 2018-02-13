<?php

namespace app\components;

use app\models\Detallecarrito;
use app\models\Productos;
use linslin\yii2\curl;
use Yii;
use yii\base\Component;
use yii\helpers\Json;
use yii\helpers\Url;

class Sintesis extends Component
{
    var $carrito;
    var $usuario;
    var $mensaje;

    var $titulo_pagina = "Priamo Italy";
    var $razon_social = " Jilmar R. Zubieta Arancibia";
    var $nit = "6906672014";


    //prod
    var $codigo_empresa = "180";
    var $cuenta = "wspriamo";
    var $password = "Wspriamo2017";
    var $key = 'priamo#031#pri';
    var $url = "https://web.sintesis.com.bo:443/WSApp-war/contract/ComelecWS.wsdl";
    var $urlTC = "https://web.sintesis.com.bo/payment/#/pay";
    var $urlCT = "https://mi.pagosnet.com.bo/pagosnet-api/transacciones";

    //dev
    //var $codigo_empresa = "31";
    //var $cuenta = "wspriamo";
    //var $password = "Wspriamo2017";
    //var $key = 'priamo#031#pri';
    //var $url = "http://test.sintesis.com.bo/WSApp-war/ComelecWS?WSDL";
    //var $urlTC = "https://test.sintesis.com.bo/payment/#/pay";
    //var $urlCT = "https://test.sintesis.com.bo/pagosnet-api/transacciones";

    var $items_valores = array();

    //var $error = array("");

    public function __construct()
    {
    }

    private function volcado()
    {
        $tmp = Detallecarrito::find()->where(['idcarrito' => $this->carrito->idcarrito])->count();
        if ($tmp > 0) {
            Detallecarrito::deleteAll(['idcarrito' => $this->carrito->idcarrito]);
        }

        foreach (Yii::$app->cart->positions as $item) {
            $item->idcarrito = $this->carrito->idcarrito;
            $item->cantidad = $item->quantity;
            $item->subtotal = $item->getCost();
            $item->precio = round(($item->subtotal / $item->cantidad), 2);
            $item->save();

            $temp = array(
                'numeroItem' => $item['iddetallecarrito'],
                'descripcion' => $item->producto['titulo'] . ' ' . $item->talla['valor'],
                'precioUnitario' => $item->getCost(),
                'cantidad' => $item->quantity
            );
            array_push($this->items_valores, $temp);
        }

    }

    public function exito($carrito)
    {
        $carrito->estado = 1;
        $carrito->fecha_pago = date('Y-m-d H:i:s');

        if ($carrito->save()) {
            return 1;
        }

        return 0;
    }

    public function pagosNet($carrito, $usuario)
    {
        //modificacion A=adicionar, {B|E}=borrar, M=modificar
        //Tipo 1=PagosNet, 2=Tarjeta
        $tmp1 = $this->carrito(1, $carrito, $usuario, 'A');
        $this->mensaje = $tmp1->descripcionError;
        if ($tmp1->codigoError == 0) {
            $tmp = $this->detalle($tmp1->idTransaccion, 'A');
            if ($tmp->codigoError == 0) {
                return $tmp1->idTransaccion;
            } else {
                $this->mensaje = Json::encode($tmp);
                $tmp1 = $this->carrito(1, $carrito, $usuario, 'B');
            }
        }
        return null;
    }

    public function tarjetas($carrito, $usuario)
    {
        //modificacion A=adicionar, {B|E}=borrar, M=modificar
        //Tipo 1=PagosNet, 2=Tarjeta
        $tmp1 = $this->carrito(2, $carrito, $usuario, 'A');
        $this->mensaje = $tmp1->descripcionError;
        if ($tmp1->codigoError == 0) {
            $tmp = $this->detalle($tmp1->idTransaccion, 'A');
            if ($tmp->codigoError == 0) {
                $tmp2 = $this->tarjeta($tmp1->idTransaccion, 'A');
                if ($tmp2->codigoError == 0) {
                    return "{$this->urlTC}?entidad={$this->codigo_empresa}&ref={$tmp1->idTransaccion}&red=" . Url::base() . Url::to(['sitesis/exito', 'id' => $carrito->idcarrito]);
                }
            } else {
                $this->mensaje = 'Hubo un error en la comunicacion con el sistema';
                $tmp1 = $this->carrito(2, $carrito, $usuario, 'B');
            }
        }
        return null;
    }

    private function carrito($tipo, $carrito, $usuario, $mod)
    {
        $this->carrito = $carrito;
        $this->usuario = $usuario;

        $this->volcado();

        //encriptacion
        $DPLANILLAS = array(
            'numeroPago' => (int)1,
            'montoPago' => (double)(Yii::$app->cart->getCost()),
            'descripcion' => "Pago por compra en " . $this->titulo_pagina,
            'montoCreditoFiscal' => (($tipo == 2) ? 0 : (double)(Yii::$app->cart->getCost())),
            'nombreFactura' => $this->carrito->razon_social,
            'nitFactura' => $this->carrito->nit
        );

        $DATOS = array(
            'transaccion' => $mod,//A=adicionar, {B|E}=borrar, M=modificar
            'nombreComprador' => $this->carrito->razon_social,
            'documentoIdentidadComprador' => $this->carrito->nit,
            'codigoComprador' => $this->carrito->idusuario,
            'correoElectronico' => $this->usuario->email,
            'codigoEmpresa' => (int)$this->codigo_empresa,
            'fecha' => (int)date('Ymd', strtotime($this->carrito->fecha_registro)),
            'moneda' => 'BS',
            'codigoRecaudacion' => (string)$this->carrito->idcarrito,
            'descripcionRecaudacion' => "Pago por compra en " . $this->titulo_pagina,
            'fechaVencimiento' => (int)(date('Ymd', strtotime($carrito->fecha_registro)) + 2),//0 = no tiene vencimiento
            'horaVencimiento' => (int)date('His', strtotime($carrito->fecha_registro)),
            'categoriaProducto' => (string)$tipo,
            'planillas' => $DPLANILLAS
        );

        $param = array(
            'datos' => $DATOS,
            'cuenta' => $this->cuenta,
            'password' => $this->password
        );
        $client = new \mongosoft\soapclient\Client([
            'url' => $this->url,
        ]);
        try {
            $result = $client->registroPlan($param);
        } catch (\Exception $exception) {
            return null;
        }

        return $result->return;

    }

    private function detalle($idTransaccion, $mod)
    {
        $datos = array(
            'transaccion' => $mod,
            'idTransaccion' => $idTransaccion,  /*con el idTransaccion devuelto por el anterior metodo, se puede realizar el registro del Detalle*/
            'numeroPago' => 1,
            'items' => $this->items_valores
        );

        $paramsItem = array(
            'datos' => $datos,
            'cuenta' => $this->cuenta,
            'password' => $this->password
        );

        $client = new \mongosoft\soapclient\Client([
            'url' => $this->url,
        ]);

        try {
            $result = $client->registroItem($paramsItem);
        } catch (\Exception $exception) {
            return null;
        }

        return $result->return;
    }

    private function tarjeta($idTransaccion, $mod)
    {

        $datosTarjetaHabiente = array(
            'idTransaccion' => $idTransaccion,
            'transaccion' => $mod,
            'nombre' => $this->usuario->nombre,
            'apellido' => $this->usuario->apellido,
            'correoElectronico' => $this->usuario->email,
            'telefono' => $this->usuario->movil,
            'pais' => $this->usuario->pais,
            'departamento' => $this->usuario->ciudad,
            'ciudad' => $this->usuario->ciudad,
            'direccion' => $this->usuario->nombre
        );

        $param = array(
            'datos' => $datosTarjetaHabiente,
            'cuenta' => $this->cuenta,
            'password' => $this->password
        );

        $client = new \mongosoft\soapclient\Client([
            'url' => $this->url,
        ]);
        try {
            $result = $client->registroTarjetaHabiente($param);
        } catch (\Exception $exception) {
            return null;
        }

        return $result->return;

    }

    //


    public function consultarTransacciones($idTransaccion)
    {

        $curl = new curl\Curl();

        $response = $curl->setPostParams([
            'transactionId' => $idTransaccion,
            'codigoEmpresa' => $this->codigo_empresa,
            'key' => $this->key
        ])
            ->post($this->urlCT);
        /*curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($curl);*
        //$info = curl_getinfo($curl);
        if ($info['http_code'] === 200) {
            curl_close($curl);
            return $response;
        } else {
            echo 'Problemas al consumir el servicio web.';
            curl_close($curl);
            return null;
        }*/
        return $response;
    }


    public function saveInventario()
    {
        $items = array();
        if ($this->carrito->items)
            $items = $this->carrito->items;

        Productos::saveInventario($items, $this->carrito->idcarrito);

    }
}
