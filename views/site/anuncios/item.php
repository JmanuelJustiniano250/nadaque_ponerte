<?php
/* @var $this yii\web\View */

use himiklab\thumbnail\EasyThumbnailImage;
use kartik\widgets\StarRating;
use rmrevin\yii\fontawesome\FA;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$script = <<<CSS

.privatemen { border-color: #e5e5e5;   background: #f7f7f7;   padding: 15px; }  .nav-tabs.descr li {  border-top: 0px solid #3a3d41;   margin: 0;   /* width: 25%; */   transition: all 0.2s ease-in-out;   -moz-transition: all 0.2s ease-in-out;    -webkit-transition: all 0.2s ease-in-out;   -o-transition: all 0.2s ease-in-out;   margin-right: 0px;} .privatemen::placeholder { color: #a5a5a5!important;  }

.
.comentraio::placeholder { color: #ccc!important;  }
.nav-tabs.descr > li.active > a, .nav-tabs.descr > li.active > a:hover, .nav-tabs.descr > li.active > a:focus {
       color: white!important;
    background: #ff6d89!important;
    border: 1px solid #ff6d89!important;
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

.btnregister{ border: 0px solid; padding:10px 18px} .tab-content.desce .tab-pane {  padding: 15px 0px;  } .rating-md { font-size: 1.5em; }

.rating-container .caption {
    margin-left: 5px;
    margin-right: 0;
    display: none;
}

.redespergil {
    padding-left: 10px;
    padding-top: 0px;
    float: inherit;
    list-style: none;
    display: inline-block;
    margin-bottom: 25px;
}

.rating-container .clear-rating {
    padding-right: 5px;
    display: none;
}

.rating-container .caption {
   
    display: none;
}
.rating-container .empty-stars {
    color: #ff839a;
}

.rating-container .filled-stars {
    color: #ff839a;
    -webkit-text-stroke: 0px #777;
    text-shadow: 0px 0px #ff839a;
}



.modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
    background: #ff6d89;
    color: white;
}



button.close {
    -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: white;
    border-radius: 65px;
    padding: 0px 4px;
    border: 0px solid;
}

.link2{
    display: block;
    text-align: center;
    margin-top: 20px;
    background: #ff6d89;
    color: white;
    font-size: 16px;
    width: 12%;
    padding: 5px 4px;
    border-radius: 73px;
    margin-bottom: 10px;
}

.close {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #a2a2a2;
    text-shadow: 0 0px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 1;
}

.btnregister.enviarsns{
background-color: #000000;
    padding: 5px 20px;
}

.modal-footer{
border-top: 1px solid transparent;
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


                    <li class="slide">
                        <?php echo Html::a(
                            Html::img('@web/imagen/anuncios/' . $model['foto'], ['class' => 'image'])
                        ) ?>
                        <img class="thumbnail" src="<?= Url::to('@web/imagen/anuncios/' . $model['foto']) ?>"/>
                    </li>


                    <li class="slide">
                        <?php echo Html::a(
                            Html::img('@web/imagen/anuncios/' . $model['foto2'], ['class' => 'image'])
                        ) ?>
                        <img class="thumbnail" src="<?= Url::to('@web/imagen/anuncios/' . $model['foto2']) ?>"/>
                    </li>


                    <li class="slide">
                        <?php echo Html::a(
                            Html::img('@web/imagen/anuncios/' . $model['foto3'], ['class' => 'image'])
                        ) ?>
                        <img class="thumbnail" src="<?= Url::to('@web/imagen/anuncios/' . $model['foto3']) ?>"/>
                    </li>


                    <li class="slide">
                        <?php echo Html::a(
                            Html::img('@web/imagen/anuncios/' . $model['foto4'], ['class' => 'image'])
                        ) ?>
                        <img class="thumbnail" src="<?= Url::to('@web/imagen/anuncios/' . $model['foto4']) ?>"/>
                    </li>


                    <li class="slide">
                        <?php echo Html::a(
                            Html::img('@web/imagen/anuncios/' . $model['foto5'], ['class' => 'image'])
                        ) ?>
                        <img class="thumbnail" src="<?= Url::to('@web/imagen/anuncios/' . $model['foto5']) ?>"/>
                    </li>


                </ul>
            </div><!--fin galeria-->

        </div>


        <div class="col-md-5 col-xs-12">


            <div class="col-xs-12" style="padding-left: 0;">

                <div class="titulodeprnedaitem">
                    <h4 class="tituprodit"><?= $model['titulo'] ?></h4>


                </div>
            </div>

            <div class="col-sm-6 col-xs-12" style="padding-left: 0;">


                <p style="font-weight: 600">Cod. <?= $model['codigo'] ?></p>
                <br>
                <p><span class="colorww">Categoría </span>: <?= $model->categoria['nombre'] ?>  </p>


                <!--<p><span class="colorww">Sub categoria </span>: Jean</p>-->
                <!--<p><span class="colorww">Condición :</span>Nuevo con etiqueta</p>-->


                <?php if ($model['precio_promocion']): ?>

                    <p class="colortemp" style="font-size: 22px; font-weight: 600">
                        Bs. <?= $model['precio_promocion'] ?>  </p>
                    <p class="colortemp" style="font-size: 15px;
    text-decoration: line-through;
    font-weight: 300;">Bs.<?= $model['precio'] ?></p>

                <?php else: ?>

                    <p class="colortemp" style="font-size: 22px; font-weight: 600">Bs. <?= $model['precio'] ?> </p>

                <?php endif; ?>


                <!-- Modal del enviar mensaje -->

                <!-- line modal -->

                <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title" id="lineModalLabel"
                                    style=" font-size: 16px; font-weight: 600; color: white">

                                    Ponte en contacto con <?= $model->usuario['alias'] ?>
                                </h3>
                            </div>
                            <div class="modal-body">

                                <p style="color: #6b6b6b;">
                                    Comunícate de la forma que mas te convenga con la vendedora:
                                </p>


                                <p style="margin-top: 15px; margin-bottom: 5px;"><span
                                            style="font-weight: 600; color: #fda4b5">Número de telefono : </span>


                                    <?php if ($model->usuario['telefono']): ?>
                                        <?php if ($model->usuario['visibletelefono']): ?>

                                            <?= $model->usuario['telefono'] ?>

                                        <?php else: ?>
                                            <strong>No disponible</strong>

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
                                                <a href="<?= $model->usuario['instagram'] ?>" target="_blank"><i
                                                            class="fa fa-instagram"
                                                            aria-hidden="true"></i></a>
                                            </li>
                                        <?php else: ?>

                                        <?php endif; ?>

                                    <?php endif; ?>
                                    <br>
                                </ul>


                                <br>
                                <p style="color: #6b6b6b;">
                                    O bien mándale un mensaje privado, la respuesta aparecera en tu mensajería.
                                </p>

                                <br>


                                <!-- content goes here -->


                                <?php $form = ActiveForm::begin([
                                    'action' => ['/cuenta/mensaje2'],
                                    'id' => 'login-form',
                                    /*'layout' => 'horizontal',
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                                    ],*/
                                ]); ?>


                                <?php $modmess = new \app\models\Mensajes(); ?>
                                <?php $modmess->idvendedor = $model->idusuario; ?>
                                <?php $modmess->tipo = 0; ?>



                                <?= $form->field($modmess, 'detalle')->textarea(['class' => 'form-control privatemen', 'placeholder' => 'Escribe el mensaje y el nombre de la prenda', 'style' => "width: 100%", 'rows' => "5"])->label(false) ?>
                                <?= $form->field($modmess, 'idvendedor')->hiddenInput()->label(false) ?>
                                <?= $form->field($modmess, 'tipo')->hiddenInput()->label(false) ?>

                                <div align="right">

                                    <a class=""
                                       style="color: #ff6d89; padding-right: 20px; text-decoration: underline;font-family: 'Raleway', sans-serif;"
                                       href="<?= Url::to(['site/perfil', 'id' => $model->idusuario]) ?>">Perfil de la
                                        vendedora</a>

                                    <button type="submit" class="btn btn-default btnregister enviarsns">Enviar</button>
                                </div>
                                <?php ActiveForm::end(); ?>


                                <br>


                            </div>
                            <div class="modal-footer">
                                <div class="btn-group btn-group-justified " role="group" aria-label="group button">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-sm-6 col-xs-12" style="padding-left: 0;">

                <div class="">


                    <div class="imagennsope">

                        <a href="" data-toggle="modal" data-target="#squarespaceModal" class="botoncontacro">

                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span style="font-size: 12px;">Comunícate con la anunciante</span>

                           <!-- <img src="<?= Url::to('@web/assets_b/images/quiero.png') ?>" alt=""
                                 max-width: 100%; margin: 0 auto; display: block" class="lefte">-->

                        </a>

                    </div>



                    <div align="right" class="lefte"><br>

                        <a href="<?= \yii\helpers\Url::to(['site/deseosadd', 'id' => $model->idanuncio]) ?>"
                           class="link3"><?= FA::icon(FA::_HEART) ?></a>
                    </div>



                    <div class="col-xs-12" style="padding-left: 0; padding-right:0 ">

                    <div align="right" class="lefte modalesw"><br><br><br>
                        <a href="" data-toggle="modal" class="btonhreg " data-target="#squarespaceModaljuntar"
                           style="font-weight: 300;  font-size: 11px">

                            ¿Cómo me puedo juntar?</a>


                    </div>


                    <div align="right" class="lefte modalesw">


                        <a href="" data-toggle="modal" class="btonhreg " data-target="#squarespaceModalmedidas"
                           style="font-weight: 300; font-size: 11px">

                            ¿Cómo tomar mis medidas?</a>


                    </div>
                    </div>

                </div>


            </div>


            <div class="col-xs-12" style="padding-left: 0; padding-right: 0">

                <div class="linecir"></div>

                <p><?= (isset($model->anunciosFiltros->condicion['value'])) ? (Html::tag('span', 'Condición: ', ['class' => 'colorww']) . $model->anunciosFiltros->condicion['value']) : '' ?></p>
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
                                <p>DESCRIPCIÓN</p>
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


        </div>


        <div class="col-md-3 col-xs-12">
            <div class="panelmejoresvendidos">

                <div class="center-block text-center">
                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/') . $model->usuario['foto'],
                        70,
                        70,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => 'margin: 0 auto; border-radius: 40px; margin-top: 5px;', 'class' => 'img-responsive']
                    );
                    ?>
                </div>

                <p class="text-center pnmbreven">
                    <strong style="color: black"><?= $model->usuario['nombres'] ?>
                    </strong></p>


                <p class="text-center" style="color: #929292; font-weight: 600">
                    <?= \app\models\Anuncios::find()->where(['idusuario' => $model->idusuario, 'estado' => 1])->count() ?>
                    prendas
                </p>
                <div style="border-bottom: 1px solid white;  border-bottom-style: dashed;  margin: 0px 30px ">
                    <?php
                    $us = '';
                    if (isset(Yii::$app->session->get('user')['idusuario']))
                        $us = Yii::$app->session->get('user')['idusuario'];
                    if ($model->idusuario != $us):
                        ?>

                        <div align="center">

                            <a href="" data-toggle="modal" class="calsiw" data-target="#califModal" style="color: #929292;
    text-align: center;
    font-weight: 600; text-align: center">
                                ¡Calificame!
                            </a>

                        </div>
                        <!-- line modal -->
                        <div class="modal fade" id="califModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                        <h3 class="modal-title text-center" id="lineModalLabel">Calificame</h3>
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
                                        <?= $form->field($modelcal, 'puntaje')->label(false)->widget(\kartik\widgets\StarRating::classname()); ?>
                                        <?= $form->field($modelcal, 'mensaje')->textarea(['class' => 'form-control', 'placeholder' => 'Escribe un comentario acerca de mi', 'style' => "width: 100%", 'rows' => "5"])->label(false) ?>
                                        <?= $form->field($modelcal, 'idvendedor')->hiddenInput()->label(false) ?>


                                        <div align="center">
                                            <button type="submit" class="btn btn-default btnregister"
                                                    style="color: white">Calificar
                                            </button>
                                        </div>

                                        <?php ActiveForm::end(); ?>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="btn-group btn-group-justified" role="group"
                                             aria-label="group button">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div align="center">

                            <?php
                            $query = \app\models\Calificaciones::find()
                                ->where(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
                            $valor = ($query->sum('puntaje') / (!empty($query->count()) ? $query->count() : 1));
                            $valor2 = ($query->count('idusuario'));


                            echo StarRating::widget([
                                'name' => 'rating_21',
                                'value' => ($valor),
                                'pluginOptions' => [
                                    'readonly' => true,
                                    'showClear' => false,
                                    'showCaption' => false,
                                ],
                            ]); ?>
                            <?php

                            ?>

                        </div>

                    <?php endif; ?>

                </div>


                <a class="moreven btn center-block" href="<?= Url::to(['site/perfil', 'id' => $model->idusuario]) ?>">Perfil
                    de la vendedora</a>

            </div>

        </div>

        <hr>
        <br><br><br>

            <div class="col-xs-12">
                <h3>Comentarios</h3>

                <?php $modmess = new \app\models\Mensajes(); ?>
                <?php $modmess->idanuncio = $model->idanuncio; ?>
                <?php $modmess->tipo = 1; ?>
                <?php $form = ActiveForm::begin([
                    'action' => ['/cuenta/mensaje'],
                    'id' => 'login-form',
                    /*'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                    ],*/
                ]); ?>
                <?= $form->field($modmess, 'detalle')->textarea(['class' => 'form-control cajadesct comentraio', 'placeholder' => 'Deja tu comentario o duda aquí para la vendedora ej: mas características, medidas, tipo de envío o lo que desees para conocer más del anuncio'])->label(false) ?>
                <?= $form->field($modmess, 'idanuncio')->hiddenInput()->label(false) ?>
                <?= $form->field($modmess, 'tipo')->hiddenInput()->label(false) ?>

                <div class="submit-area" align="left"><br>
                    <input type="submit" name="enviar" id="" class="btnregister" style="text-transform: none"
                           value="Dejar Comentario">
                </div>

                <?php ActiveForm::end(); ?> <br><br>

                <?php foreach ($model->mensajes as $key => $mensaje): ?>
                    <div class="col-xs-12" style="padding-left: 0; padding-right: 0">


                        <?php if ($mensaje->usuario['idusuario'] == $model->idusuario) : ?>
                            <div class="col-md-1"></div>
                        <?php else: ?>

                        <?php endif; ?>

                        <div class="col-md-11 col-xs-12">

                            <div class="<?= (($mensaje->usuario['idusuario'] == $model->idusuario) ? 'anunciantes' : 'cajausuario') ?>">



                                <div class="imagenusario" align="right">
                                    <span><?= $mensaje->usuario['nombres'] ?> </span>
                                    <?=
                                    EasyThumbnailImage::thumbnailImg(
                                        Yii::getAlias('@webroot/imagen/usuarios/' . $mensaje->usuario['foto']),
                                        45,
                                        45,
                                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                        ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;     margin-top: 5px;', 'class' => 'img-responsive']
                                    );
                                    ?>

                                </div>

                                <div class="comentarios2" style="padding-left: 10px; margin-top: -35px;">
                                    <p><?= $mensaje['detalle'] ?></p>

                                    <p style="     font-size: 12px; color: #ff6d89; margin-bottom: 5px; font-weight: 300"><?php $date = \app\components\Funcions::fecha($mensaje['fecha_registro']);
                                        echo $date['dia'] . ' ' . $date['mes'] . ' ' . $date['anio'] . ' ' . date('H:m', strtotime($mensaje['fecha_registro'])) ?></p>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
            <br>

    </div>

</div>

<br><br>


<div class="modal fade" id="squarespaceModaljuntar" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel"
                    style=" font-size: 16px; font-weight: 600;  text-transform: uppercase">

                    Como me puedo juntar
                </h3>
            </div>
            <div class="modal-body">


                <div class="col-xs-12">


                    <h4 style="font-weight: 600">Opción 1: Júntate en su casa o tu casa</h4>

                    <p>
                        Sabemos que en un mundo soñado todas tus amigas comprarían tus prendas a la venta, y tú
                        comprarías sus prendas, pero resulta que no tienen los mismos gustos, y peor aún no son de la
                        misma talla . Por ello a través de los anuncios de Nada que Ponerte, mujeres que no conoces
                        aún, pueden ser tus compradoras, ¡y tú también comprar sus prendas tesoro!
                        <br> Espera…pero ¿cómo me puedo juntar con alguien que no conozco para comprar o vender una
                        prenda o accesorio?
                    </p>


                    <h4 style="font-weight: 600">Opción 2: Júntate en un lugar neutral</h4>

                    <p>
                        Ni tu casa ni mi casa, juntémonos en un café! O donde se les ocurra pero con la condición que se
                        sientan cómodas, seguras siempre y que haya en ese lugar escogido un espacio adecuado donde
                        pueda probarse la compradora, si así amerita la prenda. Consejo: Sigue siempre tu intuición y no
                        arriesgues tu seguridad.
                    </p>

                    <h4 style="font-weight: 600">Opción 3: Júntate en nuestras oficinas!</h4>

                    <p>
                        Nuestro equipo estará más que feliz de recibir a todas esas amantes de los tesoros escondidos en
                        armarios, te esperamos con una oficina que está equipada con un probador, unos sillones cómodos
                        y ¡un espejito mágico!.
                        <br> No es obligatorio, pero preferimos que nos avises con anterioridad el día y la hora que te
                        juntarás en nuestra oficina con tu compradora/vendedora, así podemos esperarlas con cafecito o
                        lo que se nos ocurra .
                        <br> Nuestros horarios de atención son martes a viernes de 14:00 a 20:00 y sábado de 9:30 a
                        13:00.
                        <br><br>Si tienes alguna duda ¡contáctanos¡

                    </p>

                </div>


            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified " role="group" aria-label="group button">

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="squarespaceModalmedidas" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel"
                    style=" font-size: 16px; font-weight: 600;  text-transform: uppercase">

                    Cómo tomar mis medidas
                </h3>
            </div>
            <div class="modal-body">


                <div class="col-xs-12">


                  <p>Es necesario que puedas medirte para saber si las prendas pueden o no quedarte bien,
                      recuerda que existen diferentes cortes y telas que pueden quedar a un cuerpo y a otro no.
                  </p>


                    <ul class="lignsop">
                        <li>
                            Con una cinta de medir flexible podrás tomar todas las medidas de tu cuerpo.



                        </li>

                        <li>
                            <span style="font-weight: 600">
                               Busto:
                            </span> Envuélvete la cinta alrededor de la parte más ancha de tu busto, no tiene que estar flojo pero tampoco apretado.
                       </li>
                        <li>
                              <span style="font-weight: 600">
                            Cintura:   </span> Envuélvete la cinta por la parte más angosta de tu cintura, por lo general en la línea del ombligo, sin estar flojo ni apretado.

                        </li>
                        <li>
                              <span style="font-weight: 600">
                            Espalda:   </span> En la espalda, justo debajo de las axilas pasa la cinta métrica para obtener el ancho de tu espalda, es el punto más ancho.
                        </li>
                        <li>
                              <span style="font-weight: 600">
                            Cadera:   </span>Párate con tus piernas media separadas, y mide la parte más ancha de la cadera incluyendo los glúteos. Algunas mujeres tienen la parte más ancha en los muslos, pero no es allí de donde debes sacar la medida.
                        </li>

                    </ul>

                    <br>

                    <p class="text-center" style="font-weight: 600">
                            Medidas adicionales que pueden servirte:
                    </p>

                    <p>

                        Para hacerte una idea si una prenda te quedaría como quieres, debes saber ciertas medidas específicas en tu cuerpo, aquí te van:


                        <br><br>
                      <span style="font-weight: 600">Largo de blusa:  </span> <br>
                        Se toma desde el nacimiento del hombro, pasando por la parte más sobresaliente del busto dejándolo caer libremente hasta donde sería el largo de la blusa que usarías.
                        <br> <span style="font-weight: 600">  Largo de espalda para blusa: </span>  <br>
                        Se toma desde el nacimiento del hombro hasta el largo de la prenda deseada. La mayoría de las veces es diferente al largo de la parte delantera.
                        <br>  <span style="font-weight: 600">  Largo de falda: </span>  <br>
                        Se toma la medida en tu cuerpo desde donde quieras que sea la parte superior de la falta (cintura, semi cadera, cadera) hasta donde sería el largo de la falda que usarías.

                    </p>
                </div>


            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified " role="group" aria-label="group button">

                </div>
            </div>
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

