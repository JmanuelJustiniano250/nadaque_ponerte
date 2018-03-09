<?php

use kartik\widgets\ActiveForm;
use himiklab\thumbnail\EasyThumbnailImage;
use kartik\widgets\StarRating;
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
        </div>
    </div>












    <div class="container">
        <div class="pricing-box" align="center">
            <div class="col-xs-12">
                <div class="pricing-item2" >
                    <ul class="pricing-table basic">
            <?php foreach ($model as $item): ?>


                        <li class="title pricing-item">
                            <div class="cajapaqeutepri">
                            <h1><?= $item['nombre'] ?></h1>
                            <p>Bs <span><?= $item['precio'] ?></span> / <?= $item['tiempo_vida'] ?> Dias</p>

                            </div>


                            <div class="cajapaquetes">

                            <p>Nro. de anuncios <?= $item['nro_anuncios'] ?> </p> <br>


                            <div><?= $item['descripcion'] ?> <br> </div>


                            <a href="<?= Url::to(['site/carrito', 'id' => $item['idpaquete']]) ?>" class="button-third">Elegir</a>
                            </div>

                        </li>


            <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>









</div>

