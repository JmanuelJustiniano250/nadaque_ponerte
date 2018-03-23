<?php

use kartik\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Anunciantes */
/* @var $form ActiveForm */

$configuracion = \app\models\Configuracion::find()->one();
$this->render('../widgets/metatags', ['model' => $configuracion]);

$script = <<<CSS
.nav-pills > li.active > a{
    background-color: #ff5a96;
}
.modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
    background: #ff6d89;
    color: white;
}

.close {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #a2a2a2;
    text-shadow: 0 0px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 1;
}

button.close {
    -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: white;
    border-radius: 65px;
    padding: 0px 4px;
    border: 0px solid;
}
.nav-pills > li > a{
    color: #ff5a96;
}

.nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
}

.deaq31{

}
@media (min-width: 992px)
{
.pricing-box .pricing-item{

}

}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 0px solid #e5e5e5;
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);
?>

<!-- pricing-section
            ================================================== -->
<div class="section-content pricing-section">
    <!--<div class="text-center">
        <?=
    // Usage with bootstrap nav pills.
    Nav::widget([
            'options' => ['class' => 'nav nav-pills '],
            'items' => [
                ['label' => 'Comprar', 'url' => ['site/vender', 'page' => 'comprar']],
                ['label' => 'Publicar', 'url' => ['site/vender', 'page' => 'publicar']]
            ]
        ]
    );
    ?>
    </div> -->


    <?php $compra = \app\models\Compra::find()->where(['idusuario' => Yii::$app->session->get('user')['idusuario']])->count() ?>


    <div class="title-section white">
        <div class="container">
            <h1>Oferta de anuncios</h1> <br>
            <p>Selecciona el anuncio suelto o el paquete que te convenga</p>


            <div align="center"><br>
                <a href="" data-toggle="modal" class="btonhreg" data-target="#squarespaceModal">


                    Como funcionan los paquetes</a> <br>

            </div>


        </div>
    </div>


    <div class="container">
        <div class="pricing-box" align="center">
            <div class="col-xs-12">
                <div class="pricing-item2">
                    <ul class="pricing-table basic">
                        <?php foreach ($model as $item): ?>


                            <li class="title pricing-item">
                                <div class="cajapaqeutepri">
                                    <h1><?= $item['nombre'] ?></h1>
                                    <p>Bs <span><?= $item['precio'] ?></span> / <?= $item['tiempo_vida'] ?> Dias</p>

                                </div>


                                <div class="cajapaquetes">

                                    <p>Nro. de anuncios <?= $item['nro_anuncios'] ?> </p> <br>


                                    <div><?= $item['descripcion'] ?> <br></div>


                                    <a href="<?= Url::to(['site/carrito', 'id' => $item['idpaquete']]) ?>"
                                       class="button-third">Elegir</a>
                                </div>

                            </li>


                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>


<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel"
                    style=" font-size: 16px; font-weight: 600; text-transform: uppercase; ">

                    ¿Cómo funcionan los paquetes de anuncios?
                </h3>
            </div>
            <div class="modal-body">


                <div class="col-xs-12">
                    <p>

                        Veamos en un ejemplo para que sea más fácil de entender.

                    </p>
                    <p>

                    <p>Supongamos que necesitas un paquete de 3 anuncios porque tienes 3 vestidos para vender, compras
                        el dicho paquete que tiene 60 días de duración, y es el día 0.

                    <p>
                    </p>A los días creas tu primer anuncio del paquete, el cual te aprobamos a las horas siguientes; una
                    vez aprobado dicho anuncio es tu día 1 del paquete, faltándote 59 días para que el paquete expire
                    por consiguiente el anuncio también.
                    <p>

                    </p> El segundo anuncio lo haces y es aprobado en el día 10 del paquete, es decir te faltan 50 días
                    para que el paquete expire por consiguiente el anuncio también.
                    <p>

                    </p>El tercer anuncio lo haces y es aprobado en el día 20 del paquete, es decir te faltan 40 días
                    para que el paquete expire por consiguiente el anuncio también.
                    <p>

                    </p>Los 3 anuncios corren desde que se aprueban hasta el día de expiración del paquete que se
                    compró.

                    <p>
                    </p>Cualquier duda, contáctanos!


                </div>


            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified " role="group" aria-label="group button">

                </div>
            </div>
        </div>
    </div>
</div>
