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

.btnregister{ border: 0px solid; padding:10px 18px}
.tab-content.desce .tab-pane {
    padding: 15px 0px;
   
}

.redespergil {
    padding-left: 10px;
    padding-top: 0px;
    float: inherit;
    list-style: none;
    display: inline-block;
    margin-bottom: 25px;
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

            <?php if ($model['precio_promocion']): ?>

                <p class="colortemp" style="font-size: 22px; font-weight: 600">
                    Bs. <?= $model['precio_promocion'] ?>  </p>
                <p class="colortemp" style="font-size: 11px;
    text-decoration: line-through;
    font-weight: 300;">Bs.<?= $model['precio'] ?></p>

            <?php else: ?>

                <p class="colortemp" style="font-size: 22px; font-weight: 600">Bs. <?= $model['precio'] ?> </p>

            <?php endif; ?>

            <div class="imgquiero">


                <a href="" data-toggle="modal" data-target="#squarespaceModal">
                    <img src="<?= Url::to('@web/assets_b/images/quiero.png') ?>" alt="">

                </a>


                <!-- Modal del enviar mensaje -->

                <!-- line modal -->
                <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title" id="lineModalLabel" style=" font-size: 16px; font-weight: 600; color: #fda4b5">

                                    Envia un mensaje privado a  <?= $model->usuario['alias']?> <br> <span style=" color: black;   font-size: 13px;
    font-weight: 300;">la respuesta aparecera en tus mensajes privados.
                                </span>
                                </h3>
                            </div>
                            <div class="modal-body">






                                <p style="margin-top: 10px;">  <span style="font-weight: 600; color: #fda4b5">Número de telefono : </span>


                                    <?php if ($model->usuario['telefono']): ?>
                                    <?php if ($model->usuario['visibletelefono']): ?>

                                   <?= $model->usuario['telefono'] ?>

                                <?php else: ?>

                                <?php endif; ?>
                                <?php endif; ?>
                                </p>




                                <span style="font-weight: 600; color: #fda4b5">Redes Sociales: </span>
                                <ul class="redespergil">
                                    <?php if ($model->usuario['facebook']): ?>
                                        <?php if ($model->usuario['visiblefacebook']): ?>
                                            <li>
                                                <a href="<?= $model->usuario['facebook'] ?>" target="_blank"><i
                                                            class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                        <?php else: ?>

                                        <?php endif; ?>
                                    <?php endif; ?>





                                    <?php if ($model->usuario['twitter']): ?>
                                        <?php if ($model->usuario['visibletwittwe']): ?>
                                            <li>
                                                <a href="<?= $model->usuario['twitter'] ?>" target="_blank"><i
                                                            class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    <?php endif; ?>



                                    <?php if ($model->idusuario['youtube']): ?>

                                        <?php if ($model->idusuario['visibleyoutu']): ?>
                                            <li>
                                                <a href="<?= $model->usuario['youtube'] ?>" target="_blank"><i
                                                            class="fa fa-youtube" aria-hidden="true"></i></a>
                                            </li>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    <?php endif; ?>



                                    <?php if ($model->usuario['instagram']): ?>

                                        <?php if ($model->usuario['visibleinsta']): ?>

                                            <li>
                                                <a href="<?= $model->usuario['instagram'] ?>" target="_blank"><i class="fa fa-instagram"
                                                                                                                 aria-hidden="true"></i></a>
                                            </li>
                                        <?php else: ?>

                                        <?php endif; ?>

                                    <?php endif; ?>
                                </ul>




                                <!-- content goes here -->


                                <?php $form = ActiveForm::begin([
                                    'action' => ['/cuenta/mensaje'],
                                    'id' => 'login-form',
                                    /*'layout' => 'horizontal',
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                                    ],*/
                                ]); ?>


                                <?php $modmess= new \app\models\Mensajes();?>
                                <?php $modmess->idvendedor = $model->idusuario;?>
                                <?php $modmess->tipo = 0;?>



                                <?= $form->field($modmess,'detalle')->textarea(['class'=>'form-control privatemen','placeholder'=>'Escribe el mensaje y el nombre de la prenda','style'=>"width: 100%",'rows'=>"5"])->label(false)?>
                                <?= $form->field($modmess,'idvendedor')->hiddenInput()->label(false)?>
                                <?= $form->field($modmess,'tipo')->hiddenInput()->label(false)?>

                              <div align="center">  <button type="submit" class="btn btn-default btnregister">Enviar</button>
                              </div>
                                <?php ActiveForm::end(); ?>

                            </div>
                            <div class="modal-footer">
                                <div class="btn-group btn-group-justified " role="group" aria-label="group button">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="linecir"></div>

            <p><?= (isset($model->anunciosFiltros->condicion['value'])) ? (Html::tag('span', 'Condicion: ', ['class' => 'colorww']) . $model->anunciosFiltros->condicion['value']) : '' ?></p>
            <p><?= (isset($model->anunciosFiltros->talla['value'])) ? (Html::tag('span', 'Talla: ', ['class' => 'colorww']) . $model->anunciosFiltros->talla['value']) : '' ?></p>
            <p><?= (isset($model->anunciosFiltros->color['value'])) ? (Html::tag('span', 'Color: ', ['class' => 'colorww']) . $model->anunciosFiltros->color['value']) : '' ?></p>
            <p><?= (isset($model->anunciosFiltros->material['value'])) ? (Html::tag('span', 'Material: ', ['class' => 'colorww']) . $model->anunciosFiltros->material['value']) : '' ?></p>
            <p><?= (isset($model->anunciosFiltros->marca['value'])) ? (Html::tag('span', 'Marca: ', ['class' => 'colorww']) . $model->anunciosFiltros->marca['value']) : '' ?></p>
            <p><?= (isset($model->anunciosFiltros->ciudad['value'])) ? (Html::tag('span', 'Ciudad: ', ['class' => 'colorww']) . $model->anunciosFiltros->ciudad['value']) : '' ?></p>
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

                <p class="text-center" style="color: white; font-weight: 600">
                    <?= \app\models\Anuncios::find()->where(['idusuario' => $model->idusuario, 'estado' => 1])->count() ?>
                    prendas
                </p>
                <div style="border-bottom: 1px solid white;  border-bottom-style: dashed;  margin: 0px 30px ">
                    <?php
                    $us= '';
                    if(isset(Yii::$app->session->get('user')['idusuario']))
                        $us =Yii::$app->session->get('user')['idusuario'];
                    if($model->idusuario != $us):
                        ?>
                        <a href="" data-toggle="modal" data-target="#califModal">
                            Calificar
                        </a>
                        <!-- line modal -->
                        <div class="modal fade" id="califModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h3 class="modal-title" id="lineModalLabel">Envia mensaje a <?= $model->usuario['alias']?></h3>
                                    </div>
                                    <div class="modal-body">

                                        <!-- content goes here -->
                                        <?php // Usage with ActiveForm and model
                                        $modelcal = new \app\models\Calificaciones();
                                        $modelcal->idvendedor = $model->idusuario;

                                        ?>
                                        <?php $form = ActiveForm::begin([
                                            'action' => ['/cuenta/calificar'],
                                            'id' => 'login-form',
                                            /*'layout' => 'horizontal',
                                            'fieldConfig' => [
                                                'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                                                'labelOptions' => ['class' => 'col-md-4 control-label'],
                                            ],*/
                                        ]); ?>
                                        <?= $form->field($modelcal, 'puntaje')->widget(\kartik\widgets\StarRating::classname()); ?>
                                        <?= $form->field($modelcal,'mensaje')->textarea(['class'=>'form-control','placeholder'=>'Escribe el mensaje y el nombre de la prenda','style'=>"width: 100%",'rows'=>"5"])->label(false)?>
                                        <?= $form->field($modelcal,'idvendedor')->hiddenInput()->label(false)?>

                                        <button type="submit" class="btn btn-default">Enviar</button>

                                        <?php ActiveForm::end(); ?>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="btn-group btn-group-justified" role="group" aria-label="group button">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                </div>

                <a class="moreven btn center-block" href="<?=Url::to(['site/perfil','id'=> $model->idusuario])?>">Mas de la vendedora</a>

            </div>

        </div>

        <hr>
        <br><br><br>
        <?php if(!empty(Yii::$app->session->get('user'))):?>
            <div class="col-xs-12">
                <h3>Comentarios</h3>
                <br><br>
                <?php $modmess= new \app\models\Mensajes();?>
                <?php $modmess->idanuncio = $model->idanuncio;?>
                <?php $modmess->tipo = 1;?>
                <?php $form = ActiveForm::begin([
                    'action' => ['/cuenta/mensaje'],
                    'id' => 'login-form',
                    /*'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                    ],*/
                ]); ?>
                <?= $form->field($modmess,'detalle')->textarea(['class'=>'form-control cajadesct','placeholder'=>'Deja tu comentario o duda aqui para la vendedora ej: mas caracteristicas, medidas, tipo de envio o lo que desees para estar segura de la compra'])->label(false)?>
                <?= $form->field($modmess,'idanuncio')->hiddenInput()->label(false)?>
                <?= $form->field($modmess,'tipo')->hiddenInput()->label(false)?>

                <div class="submit-area" align="left"><br>
                    <input type="submit" name="enviar" id="" class="btnregister" style="text-transform: none"
                           value="Dejar Mensaje">
                </div>

                <?php ActiveForm::end(); ?> <br><br>

                <?php foreach ($model->mensajes as $key => $mensaje): ?>
                    <div class="col-xs-12" style="padding-left: 0; padding-right: 0">


                        <?php if ($mensaje->usuario['idusuario'] == $model->idusuario) :?>
                            <div class="col-md-1"></div>
                        <?php else: ?>

                        <?php  endif; ?>

                        <div class="col-md-11 col-xs-12">

                            <div class="<?= (($mensaje->usuario['idusuario'] == $model->idusuario) ? 'anunciantes' : 'cajausuario') ?>">

                                <div class="cahas">
                                    <?= Html::img('@web/assets_b/images/chats.png') ?>
                                </div>

                                <div class="imagenusario" align="right">
                                    <span><?= $mensaje->usuario['nombres'] ?> </span>
                                    <?=
                                    EasyThumbnailImage::thumbnailImg(
                                        Yii::getAlias('@webroot/imagen/usuarios/'. $mensaje->usuario['foto']) ,
                                        45,
                                        45,
                                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                        ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;     margin-top: -25px;', 'class' => 'img-responsive']
                                    );
                                    ?>

                                </div>

                                <div class="comentarios2" style="padding-left: 10px">
                                    <p><?= $mensaje['detalle']?></p>
                                    <br>
                                    <p style="color: #ff6d89; font-weight: 600"><?php $date = \app\components\Funcions::fecha($mensaje['fecha_registro']); echo $date['dia'].' '.$date['mes'].' '.$date['anio'].' '.date('H:m',strtotime($mensaje['fecha_registro']))?></p>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
            <br>
        <?php endif;?>
    </div>

</div>

<br><br>
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

