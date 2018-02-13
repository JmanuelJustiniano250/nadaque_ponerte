<?php
//use yii\helpers\Url;
?>


    <!--
<div class="container no-padding bottom-spacing3">
    <div class="row">
        <div class="col-md-12 col-xs-12 no-padding" id="myid">
            <p class="text-center text-CaviarDreamsBold21">FORMA DE PAGO</p>
        </div>

        <div class="col-md-12 col-xs-12 bottom-spacing2">
            <img src="<? //= Url::to('@web/assets_b/web/images/titulo.png') ?>" alt="titulo" class="img-responsive">
        </div>
    </div>
</div>
<div class="container no-padding bottom-spacing3">
    <div class="row">
        <ul class="list-untyled list-inline center-block" role="group" aria-label="...">
            <li>
            <a href="<? //= Url::to(['pago','id'=>'tigo'])?>" class="btn"><img
                    src="<? //= Url::to('@web/assets_b/web/images/footer-03-logo-tigo-money.png')?>" alt="Logo de Tigo Money"
                    title="TigoMoney" width="300"></a>
            </li>
            <li>
            <a href="<? //= Url::to(['pago','id'=>'pagosnet'])?>" class="btn"><img
                    src="<? //= Url::to('@web/assets_b/web/images/pagosnet-pn.jpg')?>" alt="Logo de PAGOS NET" title="PAGOS NET"
                    width="300"></a>
            </li>
            <li>
            <a href="<? //= Url::to(['pago','id'=>'tarjeta'])?>" class="btn"><img
                    src="<? //= Url::to('@web/assets_b/web/images/img-visa.jpg')?>" alt="Tarjetas de Credito" title="PAGOS NET"
                    width="200"></a>
            </li>
        </ul>
    </div>
</div>
-->


<?php


$this->registerCssFile('@web/assets_b/web/css/easy-responsive-tabs.css', ['media' => 'screen', '']);
$this->registerjsFile('@web/assets_b/web/js/easyResponsiveTabs.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]);
?>

<?= $this->render('../site/banners/fijo', ['titulo' => 'Carrito']) ?>
    <div id="mainbody">


    <div class="row top-spacing4 bottom-spacing3">

        <div class="col-md-8 col-md-offset-2 no-padding ">

            <?php \yii\widgets\Pjax::begin() ?>


            <div id="ChildVerticalTab_1">
                <ul class="resp-tabs-list ver_1">
                    <li>
                        Datos para su Facturacion
                    </li>
                    <li>
                        <i class="fa fa-credit-card fa-3x " aria-hidden="true"></i>
                        <div style="float: right; padding-top: 10px">Formas de Pago</div>


                    </li>
                    <li>
                        <i class="fa fa-info fa-3x" aria-hidden="true"></i>

                        <div style="float: right; padding-top: 10px">Confirmacion de Pago</div>
                    </li>

                </ul>
                <div class="resp-tabs-container ver_1">
                    <div>
                        <p>Datos de FActuracion</p>

                        <div>
                            <p> 333</p>
                        </div>
                        <div>
                            <p>Sada odio venenatis.4444</p>
                        </div>

                    </div>


                    <div>
                        <p>Datos de FActuracion22</p>

                        <div>
                            <p> 333</p>
                        </div>
                        <div>
                            <p>Sada odio venenatis.4444</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





<?php
$script = <<<JS
   $('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#fff', // background color for inactive tabs in this group
            //active_border_color: '#c1c1c1', // border color for active tabs heads in this group
           // active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });
JS;
$this->registerJs($script, \yii\web\View::POS_READY); ?>