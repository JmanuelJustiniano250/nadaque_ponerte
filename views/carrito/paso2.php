<?php

use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$script = <<<CSS
.form-group {
    margin-bottom: 0;
}


@media (min-width:768px)   {
  .responsive-tabs-container .accordion-link {
    display: none!important;
    margin-bottom: 10px;
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-radius: 3px;
    border: 1px solid #ddd;
    color: #333;
}


.nav-tabs>li.wwe {
    float: none;
    margin-bottom: -1px;
    display: table-cell;
    width: 10%; 
    /* max-width: 271px; */
    background: #f1f1f1;
}

}


a.inac{
color: #000;
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);
$this->registerCssFile('@web/assets_b/web/css/bootstrap-responsive-tabs.css', ['media' => 'screen', '']);
$this->registerCssFile('@web/assets_b/web/css/easy-responsive-tabs.css', ['media' => 'screen', '']);
$this->registerjsFile('@web/assets_b/web/js/easyResponsiveTabs.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]);
$this->registerjsFile('@web/assets_b/web/js/jquery.bootstrap-responsive-tabs.min.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]);
?>

<?= $this->render('../site/banners/fijo', ['titulo' => 'Carrito']) ?>
    <div id="mainbody">


    <div class="row top-spacing4 bottom-spacing3">

        <div class="col-md-11 col-sm-11 col-lg-10 col-sm-offset-1 col-lg-offset-2 no-padding ">


            <div id="ChildVerticalTab_1">
                <?= $this->render('pasos', ['active' => 2]) ?>
                <div class="resp-tabs-container ver_1">
                    <div>
                        <div class="col-md-10 col-xs-11 no-padding-right">
                            <h2 class="text-center">Seleccione su pasarela de Pago</h2>
                            <?php $form = ActiveForm::begin(['id' => 'factura', 'options' => ['class' => ''], 'action' => ['carrito/pasos', 'pasos' => '2'], 'method' => 'post']); ?>
                            <div class="row">
                                <div class="col-sm-8 col-md-6">
                                    <?= $form->field($model, 'tipo_pago')
                                        ->radioList([
                                            '1' => Html::img('@web/assets_b/web/images/pasarelas/Tigo_Money_2.jpg', ['class' => 'img-thumbnail']),
                                            '2' => Html::img('@web/assets_b/web/images/pasarelas/pagosnet-pn.jpg', ['class' => 'img-thumbnail']),
                                            '3' => Html::img('@web/assets_b/web/images/pasarelas/TC.jpg', ['class' => 'img-thumbnail']),
                                        ])
                                        ->label(false) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <br>
                                    <a href="<?= Url::to(Yii::$app->request->referrer); ?>" class="cea"><span
                                                style="font-size: 1.5em;"><i class="fa fa-angle-left"
                                                                             aria-hidden="true"></i>&nbsp;
                    </span> Volver atras </a>
                                </div>

                                <div class="col-sm-8">
                                    <br>
                                    <?= Html::submitButton('Siguiente', ['class' => 'btn btnpag', 'name' => 'contact-button ', 'style' => 'width:50%']) ?>

                                </div>

                                <?php ActiveForm::end() ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>







<?php
$script = <<<JS

$('.responsive-tabs').responsiveTabs({
   accordionOn: ['xs']
});


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