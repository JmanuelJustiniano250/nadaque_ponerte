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

.nav-pills > li > a{
    color: #ff5a96;
}

.nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);
?>

<!-- pricing-section
            ================================================== -->
<div class="section-content pricing-section">
    <div class="text-center">
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
    </div>
    <div class="title-section white">
        <div class="container">
            <h1>Paquetes de anuncios</h1>
            <p>Seleccione el paquete que mas le agrade</p>
        </div>
    </div>
    <div class="container">
        <div class="pricing-box">
            <?php foreach ($model as $item): ?>
                <div class="pricing-item">
                    <ul class="pricing-table basic">
                        <li class="title">
                            <h1><?= $item['nombre'] ?></h1>
                            <p>Bs <span><?= $item['precio'] ?></span> / <?= $item['tiempo_vida'] ?> Dias</p>
                        </li>
                        <li>
                            <p>Nro. de anuncios <?= $item['nro_anuncios'] ?> </p>
                        </li>
                        <li>
                            <p><?= $item['descripcion'] ?></p>
                        </li>
                        <li>
                            <a href="<?= Url::to(['site/carrito', 'id' => $item['idpaquete']]) ?>" class="button-third">Elegir</a>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

</div>

