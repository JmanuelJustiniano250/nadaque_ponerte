<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);

$script = <<<CSS
.nav-tabs li a {
    display: inline-block;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    -o-border-radius: 0px;
    border-radius: 0px;
    background: transparent;
    display: block;
    border: 1px solid black;
    margin-right: 2px;
    margin: 0;
    width: 100%;
    padding: 10px 20px;
    overflow: hidden;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    background: transparent!important;
    border: 1px solid #ff5a96!important;
}
CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::className()]);

?>


<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-3">
            <?= $this->render('anuncios/categorias'); ?><br>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="col-sm-6 col-md-8 col-xs-12 npadding">
                <?= $this->render('banners/publicidad_1'); ?>
            </div>

            <div class="col-sm-6 col-md-4 col-xs-12 npadding">
                <?= $this->render('banners/publicidad_2'); ?>
            </div>
            <br>
        </div>
    </div>
</div>


<?= $this->render('noticias/categorias'); ?>




<?= $this->render('anuncios/tabs'); ?>



<?= $this->render('banners/tiendas'); ?><br><br><br>


<?= $this->render('banners/promociones'); ?><br>


<div class="container">
    <div class="row">
        <img src="<?= Url::to(['assets_b/images/bastidores.jpg']) ?>" class="logo" style="margin: 0 auto; display: block;
    max-width: 100%; padding-bottom: 10px; padding-top: 10px;" alt="">
    </div>
</div>

<?= $this->render('noticias/destacados'); ?><br>

