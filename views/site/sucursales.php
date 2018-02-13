<?php

/* @var $this yii\web\View */

use yii\helpers\Url;


$script = <<<CSS

.fancybox-outer, .fancybox-inner {
    position: relative;
    height: 480px!important;
}
CSS;
$this->registerCss($script, ['depends' => \app\assets\AppAsset::class]);
$this->registerCssFile('@web/web/css/jquery.fancybox.css', ['depends' => \app\assets\AppAsset::class, 'media' => 'screen', '']);

$this->title = 'SUCURSALES';
/*$this->registerCssFile('@web/web/plugin/tabs/css/responsive-tabs.css', ['depends'=>\app\assets\AppAsset::class, 'media' => 'screen','']);
$this->registerCssFile('@web/web/plugin/tabs/css/style.css', ['depends'=>\app\assets\AppAsset::class, 'media' => 'screen','']);*/
$this->registerjsFile('@web/web/js/vendor/jquery.fancybox.js', ['depends' => \app\assets\AppAsset::class, 'position' => \yii\web\View::POS_END]);

?>
    <div id="banner2">
        <img src="<?php echo Url::to('@web/web/images/banner3.jpg') ?>" alt="Banner" class="img-responsive">
    </div>
    </div>

    <div id="mainbody">
        <div id="producto-titulo">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 no-padding text-blue">
                        <h2 class="text-ralewaybold42">Sucursales</h2>
                        <p class="text-SourceSansPro16" id="breadcrum">Inicio <span class="arrow">&nbsp;</span>Sucursales
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container no-padding-right">
            <div class="row top-spacing4 bottom-spacing3"> <!-- ROW PRODUCTOS -->
                <div class="col-md-3 no-padding-left">
                    <div class="encabezado-sucursal">
                        <h6 class="text-SourceSansProBold18 text-white">Red de Sucursales</h6>
                    </div>
                    <div id="MainMenu">
                        <div class="list-group panel no-margin">
                            <a href="<?= Url::to(['site/sucursales']) ?>"
                               class="list-group-item list-group-item-success active">Nuestras Sucursales<span
                                        class="pull-right"><img
                                            src=" <?php echo Url::to('@web/web/images/left.png') ?> "
                                            alt="+"></span></a>
                            <a href="<?= Url::to(['site/contacto']) ?>" class="list-group-item list-group-item-success">Contactenos<span
                                        class="pull-right"><img src="<?php echo Url::to('@web/web/images/left.png') ?>"
                                                                alt="+"></span></a>
                        </div>
                    </div>

                    <div class="barra">&nbsp;</div>
                    <h4 class="text-ralewaysemibold2329 text-blue top-spacing3">NUESTROS <span
                                class="text-red">PRODUCTOS</span></h4>
                    <div class="cuadros">
                        <img src=" <?php echo Url::to('@web/web/images/ico-sur1.png') ?> " alt="Nuestros Productos"
                             id="nuestro1" class="img-responsive pull-left">
                        <div class="col-sm-8 no-padding">
                            <h6 class="text-SourceSansProBold18 no-margin">Nuestros Productos</h6>
                            <p class="text-SourceSansLight12 text-justify">Ponemos a disposición de nuestros clientes un
                                gran gama de insumos médicos hospitalarios <strong> <a
                                            href="<?= Url::to(['site/productos']) ?> " class="text-enlace3">
                                        <!--productos.php?idc=10 -->&nbsp;&nbsp;VER ></a></strong></p>
                        </div>
                    </div>

                    <div class="cuadros">
                        <img src="<?php echo Url::to('@web/web/images/ico-sur2.png') ?>" alt="Nuestros Productos"
                             id="nuestro1" class="img-responsive pull-left">
                        <div class="col-sm-8 no-padding">
                            <h6 class="text-SourceSansProBold18 no-margin">Nuestros Promociones</h6>
                            <p class="text-SourceSansLight12 text-justify">Conozca nuestras constantes ofertas y
                                promociones
                                <strong><a href="<?= Url::to(['site/productos?cat=1']) ?>" class="text-enlace3">&nbsp;&nbsp;VER
                                        ></a></strong></p>
                        </div>
                    </div>

                </div>

                <div class="col-md-9 no-padding-right">

                    <h3 class="text-ralewaybold20 text-red2 no-margin">SANTA CRUZ</h3>
                    <p class="text-gray6 text-SourceSansPro15">Oficina central y 2 sucursales</p>
                    <hr>
                    <div class="col-sm-4 no-padding">
                        <h5 class="titulosucursal"><img src=" <?php echo Url::to('@web/web/images/1.png') ?>">OFICINA
                            CENTRAL</h5>
                        <p class="text-gray7 text-SourceSansPro14" style="padding-left: 40px">Calle 21 de Mayo # 683<br>
                            Telf. (591-3) 3340802<br>
                            Fax: (591-3) 3340801<br>
                            info@hospimedsrl.com<br>
                            <a href="<?= Url::to(['site/mapa', 'la' => '-17.797317', 'lo' => '-63.186614']) ?>"
                               class="text-enlace4 fancybox">ver mapa ></a>
                        </p>
                    </div>

                    <div class="col-sm-4 no-padding">
                        <h5 class="titulosucursal"><img src="<?php echo Url::to('@web/web/images/2.png ') ?>">SUCURSAL 2
                        </h5>
                        <p class="text-gray7 text-SourceSansPro14" style="padding-left: 40px">Av. Virgen de Lujan 6to
                            Anillo
                            esq. calle 5<br>
                            Telf. (591-3) 334-0801 / 69002007<br>
                            Fax: (591-3) 334-0801<br>
                            info@hospimedsrl.com<br>
                            <a href="<?= Url::to(['site/mapa', 'la' => '-17.757922', 'lo' => '-63.120628']) ?>"
                               class="text-enlace4 fancybox">ver
                                mapa ></a>
                        </p>
                    </div>

                    <div class="col-sm-4 no-padding">
                        <h5 class="titulosucursal"><img src="<?php echo Url::to('@web/web/images/3.png ') ?>">SUCURSAL
                            MONTERO</h5>
                        <p class="text-gray7 text-SourceSansPro14" style="padding-left: 40px">Calle Rosendo Paz No.
                            149<br>
                            Telf: (591) 766-88817 - (591) 691-03012 (591-3) 9208333<br>
                            info@hospimedsrl.com<br><br>
                            <a href=" <?= Url::to(['site/mapa', 'la' => '-17.340414', 'lo' => '-63.255037']) ?>"
                               class="text-enlace4 fancybox">ver mapa ></a>
                        </p>
                    </div>

                    <div class="clearfix"></div>
                    <br><br>

                    <h3 class="text-ralewaybold20 text-red2 no-margin">LA PAZ</h3>
                    <p class="text-gray6 text-SourceSansPro15">Una Sucursal</p>
                    <hr>
                    <div class="col-sm-4 no-padding">
                        <h5 class="titulosucursal"><img src=" <?php echo Url::to('@web/web/images/1.png ') ?>">SUCURSAL
                            LA
                            PAZ</h5>
                        <p class="text-gray7 text-SourceSansPro14" style="padding-left: 40px">Calle Villalobos #
                            1403<br>
                            Barrio Miraflores<br>
                            Telf: (591-2)22-24818 / (591-2) 22-23553<br>
                            ventas.lp@hospimedbolivia.com<br>


                            <a href="<?= Url::to(['site/mapa', 'la' => '-16.502533', 'lo' => '-68.120649']) ?>"
                               class="text-enlace4 fancybox">ver
                                mapa ></a>

                            <!--
                            <a href=" mapa.php?la=-16.502533&lo=-68.120649&title='Hospimed'" class="text-enlace4 fancybox">ver
                                mapa ></a>-->
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

<?php
$script = <<<JS
jQuery(document).ready(function(){


$('#btndown3').click(function(e){

e.preventDefault();

$('#formlogin').slideToggle("slow");

});
  	jQuery(".accordion-toggle").click(function(){  		
  		$( this ).toggleClass( "highlight" );  		
  	});

    $('.cuadronoticias').hover(function(){
        $(this).find('a').removeClass('text-black1').addClass('text-blue');     
    },function(){
        $(this).find('a').removeClass('text-blue').addClass('text-black1');
    });

     jQuery('.fancybox').fancybox({
         openEffect: 'elastic',
         closeEffect: 'elastic',
         prevEffect: 'fade',
         nextEffect: 'fade',
         fitToView: false, // 
         maxWidth: "90%", // 
         maxHegth: "90%", // 
         type: 'iframe',
         scrolling: 'no',
    });
    

  });
JS;
$this->registerJs($script, \yii\web\View::POS_END);
