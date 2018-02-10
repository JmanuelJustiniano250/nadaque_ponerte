<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$script = <<<CSS

CSS;
$this->registerCss($script, ['depends' => \app\assets\AppAsset::class]);
/*$this->registerCssFile('@web/web/plugin/tabs/css/responsive-tabs.css', ['depends'=>\app\assets\AppAsset::class, 'media' => 'screen','']);
$this->registerCssFile('@web/web/plugin/tabs/css/style.css', ['depends'=>\app\assets\AppAsset::class, 'media' => 'screen','']);
$this->params['breadcrumbs'][] = $this->title;*/
//$this->title = 'SERVICIOS';
$this->registerCssFile('@web/web/css/jquery.fancybox.css', ['depends' => \app\assets\AppAsset::class, 'media' => 'screen', '']);
$this->registerCssFile('@web/web/css/maps.css', ['depends' => \app\assets\AppAsset::class, 'media' => 'screen', '']);
$this->registerCssFile('@web/web/plugin/galeria/thumbrigth/css/slider-pro.min.css', ['depends' => \app\assets\AppAsset::class, 'media' => 'screen', '']);
$this->registerCssFile('@web/web/plugin/galeria/thumbrigth/css/examples.css', ['depends' => \app\assets\AppAsset::class, 'media' => 'screen', '']);
$this->registerCssFile('@web/web/plugin/galeria/highslide/highslide.css', ['depends' => \app\assets\AppAsset::class, 'media' => 'screen', '']);


$this->registerjsFile('@web/web/js/vendor/jquery.fancybox.js', ['position' => \yii\web\View::POS_END]);
$this->registerjsFile('@web/web/plugin/galeria/highslide/highslide-full.js', ['position' => \yii\web\View::POS_END]);
$this->registerjsFile('@web/web/js/vendor/google.js', ['position' => \yii\web\View::POS_END]);


?>


<div id="banner2">
    <img src="<?php echo Url::to('@web/web/images/bannerheader.jpg') ?> ">
    <div class="titulo">
        <span class="text-openbold21 text-white">SERVICIOS</span><br>
        <img src=" <?php echo Url::to('@web/web/images/barra4.png') ?>">
    </div>
</div>

<div id="mainbody">
    <div id="servicios">
        <div class="container">
            <div class="row">
                <div class="col-md-4 no-padding">
                    <p class="text-openextrabold30">Nuestros Servicios</p>
                </div>
                <div class="col-md-7">&nbsp;</div>
                <div class="col-md-1">&nbsp;</div>
            </div>
        </div>
        <hr>
        <div class="container no-padding">
            <div class="row">
                <div class="col-md-3"><a href="#cf" class="bounceIn"><img
                                src=" <?php echo Url::to('@web/web/images/servicio1.jpg') ?> " alt="servicio1"
                                class="serv"></a></div>
                <div class="col-md-3"><a href="#mg" class="bounceIn"><img
                                src="<?php echo Url::to('@web/web/images/servicio2.jpg') ?>" alt="servicio2"
                                class="serv"></a></div>
                <div class="col-md-3"><a href="#dm" class="bounceIn"><img
                                src="<?php echo Url::to('@web/web/images/servicio3.jpg') ?>" alt="servicio3"
                                class="serv"></a></div>
                <!-- <div class="col-md-3"><a href="#" class="bounceIn"><img src="images/servicio4.jpg" alt="servicio4" class="serv"></a></div>-->
            </div>
            <div class="row"><br><br>
                <hr>
                <br><br>
                <div class="col-md-12 no-padding">
                    <p class="text-openbold14"><img src=" <?php echo Url::to('@web/web/images/vineta.png') ?> " id="cf">&nbsp;&nbsp;CÁMARAS
                        FRIGORIFICAS</p><br>
                    <p class="text-opensemibold14">Instalamos las cámaras para la conservación de productos secos y
                        congelados<br>
                        Las medidas de cada una de nuestros productos están diseñadas para adecuarnos a cualquier
                        necesidad particular del cliente.
                    </p><br>
                    <p class="text-openbold14"><img src="<?php echo Url::to('@web/web/images/vineta.png') ?>" id="mg">&nbsp;&nbsp;MANTENIMIENTO
                        EN GENERAL</p><br>
                    <p class="text-opensemibold14">ISOLCRUZ siempre se ha diferenciado por ofrecer la máxima calidad en
                        sus productos y servicios<br>
                        También ofrecemos servicios de mantenimiento de cámaras frigoríficas, paneleria , puertas
                        frigoríficas ya sean batientes o corredizas, ofreciendo un Stock de repuestos para satisfacer
                        sus necesidades.<br><br><br>
                        En ISOLCRUZ, la calidad es el eje por el que se sostienen todos nuestros productos y servicios .
                    </p><br>
                    <p class="text-openbold14"><img src="<?php echo Url::to('@web/web/images/vineta.png') ?>" id="dm">&nbsp;&nbsp;DESMONTAJE
                        Y MONTAJE DE CÁMARAS FRIGORIFICAS</p><br>
                    <p class="text-opensemibold14">Nuestro potencial humano y nuestra experiencia es la mejor garantía
                        de confianza que podemos ofrecerle, desde el equipo directo hasta el personal técnico están
                        compuestos por<br>personal con años de experiencia en el sector.<br><br><br>
                        El hecho de ser fabricantes, unido a nuestros conocimientos técnicos (diseño, montaje y
                        asistencia técnica) hace que podamos ofrecerle la solución más idónea a sus necesidades.
                    </p><br>
                </div>
            </div>
            <div class="row">
                <hr>


                <div class="col-md-3">


                    <a href=" <?php echo Url::to('@web/web/images/servicios1.jpg') ?>" class="highslide"
                       onclick="return hs.expand(this)"><img
                                src="<?php echo Url::to('@web/web/images/servicios1.png') ?>"></a>

                </div>
                <div class="col-md-3">

                    <a href=" <?php echo Url::to('@web/web/images/servicios2.jpg') ?>" class="highslide"
                       onclick="return hs.expand(this)"><img
                                src="<?php echo Url::to('@web/web/images/servicios2.png') ?>"></a>


                </div>
                <div class="col-md-3">

                    <a href=" <?php echo Url::to('@web/web/images/servicios3.jpg') ?>" class="highslide"
                       onclick="return hs.expand(this)"><img
                                src="<?php echo Url::to('@web/web/images/servicios3.png') ?>"></a>


                </div>
                <div class="col-md-3">
                    <a href=" <?php echo Url::to('@web/web/images/servicios4.jpg') ?>" class="highslide"
                       onclick="return hs.expand(this)"><img
                                src="<?php echo Url::to('@web/web/images/servicios4.png') ?>"></a>

                </div>


            </div>
        </div>
    </div>
    <?= $this->render('banners/fijo') ?>
</div>


<?php

$script = <<<JS


    hs.graphicsDir = 'web/plugin/galeria/highslide/graphics/';
    hs.align = 'center';
    hs.transitions = ['expand', 'crossfade'];
    hs.outlineType = 'rounded-white';
    hs.fadeInOut = true;
    hs.dimmingOpacity = 0.75;

    // define the restraining box
    hs.useBox = true;
    hs.width = 800;
    hs.height = 600;

    // Add the controlbar
    hs.addSlideshow({
        //slideshowGroup: 'group1',
        interval: 5000,
        repeat: false,
        useControls: true,
        fixedControls: 'fit',
        overlayOptions: {
            opacity: 1,
            position: 'bottom center',
            hideOnMouseOut: true
        }
    });
     
JS;

$this->registerJs($script, \yii\web\View::POS_END);

?>
