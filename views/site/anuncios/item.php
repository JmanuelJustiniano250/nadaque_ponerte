<?php
/* @var $this yii\web\View */

use himiklab\thumbnail\EasyThumbnailImage;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$script = <<<CSS
.nav-tabs.descr li {
    border-top: 0px solid #3a3d41;
    margin: 0;
    /* width: 25%; */
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    margin-right: 0px;}

.nav-tabs.descr > li.active > a, .nav-tabs.descr > li.active > a:hover, .nav-tabs.descr > li.active > a:focus {
    color: white!important;
    background: #ff5a96!important;
    border: 1px solid #ff5a96!important;
}

.nav-tabs.descr li.active a p {
    color: white;
}

.nav-tabs.descr li a  {
   border: 1px solid #c8c8c8;
}
.tab-content.desce {
    border: 1px solid #c8c8c8;
    padding: 20px;
    /* font-size: 15px; */
}

.tab-content.desce .tab-pane h2 {
    color: #3a3d41;
    font-size: 14px;
    font-family: 'Raleway', sans-serif;
    font-weight: 700;
    margin: 0 0 2px;
    text-transform: uppercase;
    font-size: 13px;
    text-transform: inherit;
    margin: 0 0 10px;
}


.tab-content.desce .tab-pane {
    padding: 15px 0px;
   
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::className()]);

$this->render('../widgets/metatags', ['model' => $configuracion]);
?>

<?= $this->render('../widgets/breadcrumbs'); ?>
<?php $this->registerjsFile('@web/assets_b/plugin/visor/js/jquery.touchSwipe.min.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]); ?>
<?php $this->registerjsFile('@web/assets_b/plugin/galeria/thumbrigth/js/jquery.sliderPro.min.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]); ?>
<?php $this->registerjsFile('@web/assets_b/plugin/carro/lib/jquery.bxslider2.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]); ?>
<?php $this->registerjsFile('@web/assets_b/plugin/carro/lib/jquery.bxslider.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]); ?>
<?php $this->registerjsFile('@web/assets_b/plugin/visor/js/jquery.advancedSlider.min.js', ['depends' => \app\assets_b\AppAsset::class, 'position' => \yii\web\View::POS_END]); ?>


<div class="container">
    <div class="row">

        <div class="col-md-4 col-xs-12">
            <div class="advanced-slider highslide-gallery" id="responsive-slider" align="center"
                 style="border:none !important">
                <ul class="slides">
                    <?php if (empty($model->anunciosGalerias)) {
                        echo Html::tag(
                            'li',
                            Html::a(
                                Html::img('@web/imagen/anuncios/' . $model['foto'], ['class' => 'image'])
                            ) .
                            Html::img('@web/imagen/anuncios/' . $model['foto'], ['class' => 'thumbnail']),
                            ['class' => 'slide']
                        );
                    } else {
                        foreach ($model->anunciosGalerias as $item) {
                            echo Html::tag(
                                'li',
                                Html::a(
                                    Html::img('@web/imagen/anuncios/' . $item['foto'], ['class' => 'image'])
                                ) .
                                Html::img('@web/imagen/anuncios/' . $item['foto'], ['class' => 'thumbnail']),
                                ['class' => 'slide']
                            );
                        }
                    } ?>
                </ul>
            </div><!--fin galeria-->

        </div>


        <div class="col-md-5 col-xs-12">
            <h4 class="tituprodit"><?= $model['titulo'] ?></h4>
            <p style="font-weight: 600">Cod. <?= $model['codigo'] ?></p>
            <br>
            <p><span class="colorww">Categoria </span>: <?= $model->categoria['nombre'] ?></p>
            <!--<p><span class="colorww">Sub categoria </span>: Jean</p>-->
            <!--<p><span class="colorww">Condición :</span>Nuevo con etiqueta</p>-->

            <p class="colortemp" style="font-size: 22px; font-weight: 600">Bs. <?= $model['precio'] ?></p>
            <!--<p style="margin-top: -10px;  text-decoration: line-through;">Bs. 280</p>-->
            <div class="imgquiero">
                <img src="<?= Url::to('@web/assets_b/images/quiero.png') ?>" alt=""></div>

            <div class="linecir"></div>

            <?php
            foreach ($model->anunciosFiltros as $item) {
                echo Html::tag(
                    'p',
                    Html::tag(
                        'span',
                        $item->filtro->padre['nombre'],
                        ['class' => 'colorww']
                    ) . $item->filtro['nombre']
                );
            }
            ?>
            <!--<p><span class="colorww">Talla </span>: M</p>
            <p><span class="colorww">Color </span>: Celeste</p>
            <p><span class="colorww">Material :</span>Jeans</p>
            <p><span class="colorww">Marca :</span>Sin marca </p>
            <p><span class="colorww">Ciudad :</span>Santa Cruz</p>-->
            <br>
            <div class="text">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript"
                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53e2c6583afe0ece"></script>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="sociales top-spacing3 bottom-spacing3">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <script type="text/javascript"
                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54f678625eb57483"
                            async="async"></script>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_native_toolbox"></div>
                </div>


            </div>

            <div class="shortcodes-elem">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs descr" id="myTab">
                    <li class="active">
                        <a href="#desc" data-toggle="tab">
                            <p>DESCRIPCION</p>
                        </a>
                    </li>

                    <li>
                        <a href="#medidas" data-toggle="tab">
                            <p>MEDIDAS</p>
                        </a>
                    </li>
                </ul>

                <div class="tab-content desce">
                    <div class="tab-pane active" id="desc">
                        <?= $model['decripcion'] ?>
                    </div>
                    <div class="tab-pane" id="medidas">
                        <?= $model['otra_descripcion'] ?>
                    </div>

                </div>
            </div>


        </div>


        <div class="col-md-3 col-xs-12">
            <div class="panelmejoresvendidos">
                <p class="text-center pnmbreven">
                    <strong><?= $model->usuario['nombres'] ?>
                        <small>(<?= $model->usuario['alias'] ?>)</small>
                    </strong></p>
                <div class="center-block text-center">
                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/') . $model->usuario['foto'],
                        51,
                        51,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => 'margin: 0 auto; border-radius: 40px; margin-top: -25px;', 'class' => 'img-responsive']
                    );
                    ?>
                </div>

                <p class="text-center"
                   style="color: white; font-weight: 600"><?= \app\models\Anuncios::find()->where(['idusuario' => $model->idusuario, 'estado' => 1])->count() ?>
                    prendas</p>
                <div style="border-bottom: 1px solid white;  border-bottom-style: dashed;  margin: 0px 30px "></div>

                <a class="moreven btn center-block" href="#">Mas de la vendedora</a>

            </div>

        </div>

        <hr>
        <div class="col-xs-12">
            <?php $form = ActiveForm::begin([
                'action' => ['cuenta/cuenta'],
                'id' => 'login-form',
                /*'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-md-4 control-label'],
                ],*/
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>


<?php
$script = <<<JS
  $('#responsive-slider').advancedSlider({width: 740,
            height: 600,
            responsive: true,
            skin: 'glossy-square-gray',
            shadow: false,
            effectType: 'swipe',
            slideshow: true,
            pauseSlideshowOnHover: true,
            swipeThreshold: 30,
            slideButtons: false,
            thumbnailType: 'scroller',
            thumbnailWidth: 110,
            thumbnailHeight: 80,
            thumbnailButtons: false,
            thumbnailSwipe: true,
            thumbnailScrollerResponsive: true,
            minimumVisibleThumbnails: 2,
            maximumVisibleThumbnails: 5,
            keyboardNavigation: true
        });
JS;
$this->registerJs($script, \yii\web\View::POS_END); ?>

