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
.fec{
font-size: 21px;
text-align: center; font-weight: 600;
}


.btnregister {
   
    padding: 10px 15px;
    /* margin-top: 33px; */
}





CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);
?>

<!-- pricing-section
            ================================================== -->
<div class="section-content pricing-section">



    <?php $compra = \app\models\Compra::find()->where(['idusuario' => Yii::$app->session->get('user')['idusuario']])->count() ?>








    <div class="title-section white">
        <div class="container">
            <h1 style="font-size: 25px;">Selecciona    una opcion para crear tu anuncio
            </h1>


        </div>



    </div>









    <div class="container">
        <div class="pricing-box">


            <div class="col-sm-6 col-xs-12 " align="center">

<div class="bderq">
                <H3 CLASS="fec">Comprar paquete de anuncios <br> o anuncio suelto</H3><br>
                <br>
                <a href="<?php echo Url::to('vender') ?>" class="btnregister">Compra tu anuncio </a> <br><br><br>

</div>
            </div>






            <div class="col-sm-6 col-xs-12 " align="center">
                <div class="bderq">
                <H3 CLASS="fec">Usar un anuncio de paquete <br> que ya compraste</H3><br><br>
                <a href="<?php echo Url::to('cuenta/create') ?>" class="btnregister">Publica tu anuncio </a><br><br><br>
                </div>
            </div>


        </div>
    </div>









</div>

