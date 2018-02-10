<?php

use kartik\widgets\ActiveForm;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $model app\models\Anunciantes */
/* @var $form ActiveForm */

$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);

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
            <h1>Publica tus anuncios</h1>
            <p>llene todos los campos</p>
        </div>
    </div>
    <div class="container">

        <?= $this->render('anuncios/formulario', ['model' => $model]) ?>

    </div>
</div><!-- site-anunciante -->
