<?php

$script = <<<CSS
.form-group {
    margin-bottom: 0;
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);

$this->registerCssFile('@web/assets_b/web/css/easy-responsive-tabs.css', ['media' => 'screen', '']);
$this->registerjsFile('@web/assets_b/web/js/easyResponsiveTabs.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]);
?>

<?= $this->render('../site/banners/fijo', ['titulo' => 'Carrito']) ?>
    <div id="mainbody">


    <div class="row top-spacing4 bottom-spacing3">

        <div class="col-md-11 col-sm-11 col-lg-10 col-sm-offset-1 col-lg-offset-2 no-padding ">


            <div id="ChildVerticalTab_1">
                <?= $this->render('pasos', ['active' => 3]) ?>
                <div class="resp-tabs-container ver_1">
                    <?php if ($model->tipo_pago == 3): ?>
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe src="<?= $url ?>" class="embed-responsive-item">
                            </iframe>
                        </div>
                    <?php else: ?>
                        <h1 class="text-center">Gracias por Comprar por <?= $model->getTipo($model->tipo_pago) ?></h1>
                        <?php if ($model->tipo_pago == 2): ?>
                            <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 text-center">
                                <div class="well well-lg">
                                    Codigo de compra: <h3><?= $model->idcarrito ?></h3>
                                </div>
                                Puede Realizar su pago en las siguientes
                                <a href="http://pagosnet.com.bo/geolocalizacion/" target="_blank" class="btn btn-link">Sucursales</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

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