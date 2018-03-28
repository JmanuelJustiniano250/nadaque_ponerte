<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Crear Anuncios';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="col-md-4 col-sm-6">

    <div class="cajadeanuncio">
        <div class="imgprove project-gal">
            <div class="post-gal">
                <?=
                EasyThumbnailImage::thumbnailImg(
                    Yii::getAlias('@webroot/imagen/anuncios/') . $model['foto'],
                    283,
                    300,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    ['style' => 'margin: 0 auto;', 'class' => 'img-responsive']
                );
                ?>


            </div>
        </div>

        <div class="cajadesc">

            <div class="row">
                <div class="list1 cajapro">

                    <h3 class="text-center"> <?= $model['titulo'] ?></h3>


                    <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
                        <p class="nobor">Cod: <?= $model['codigo'] ?> </p>

                    </div>

                    <!-- <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
                        <p class="nobor"><span>Cod. Paquete: </span>
                            <? /*= $item['codigo'] */ ?> </p>

                    </div>-->

                </div>

                <div class="list2">


                    <p class="text-center nobor">

                        <br>

                        Publicado desde
                        <span> <?= \app\components\Funcions::fecha($model->paquete['fecha_pago'], true, true) ?></span>
                        <br>
                        <?php
                        $fecha_pago = strtotime($model->paquete['fecha_pago']);
                        $fecha_expiracion = mktime(0, 0, 0, date("m", $fecha_pago), date("d", $fecha_pago) + (isset($model->paquete->paquete['tiempo_vida']) ? $model->paquete->paquete['tiempo_vida'] : 0), date("Y", $fecha_pago));
                        $days = floor($fecha_expiracion - time()) / (60 * 60 * 24);
                        ?>

                        Dias remanentes <span> <?= ($days > 0) ? (int)$days : ' - ' ?></span>


                    <div class="text-center" align="center" style="margin-top: px;"><BR>

                        <a href="" class="registrarse" data-toggle="modal" data-target="#squarespaceModal"
                           style="margin-left: 0">
                            CAMBIAR PRECIO
                        </a>


                    </div>


                    <div class="text-center" align="center" style="margin-top: px;"><BR>
                        <?= Html::a('MARCAR COMO VENDIDO', ['cuenta/updatea', 'id' => $model->idanuncio, 'estado' => 1], [
                            'class' => 'registrarse',
                            'style' => 'margin-left: 0',
                            'data' => [
                                'confirm' => 'Esta seguro?',
                            ],
                        ]) ?>                    </div>


                    </p>
                </div>


            </div>
        </div>

    </div>

</div>


<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel" style=" font-size: 16px; font-weight: 600; color: black">

                    Cambia el precio
                </h3>
            </div>
            <div class="modal-body">


                <!-- content goes here -->


                <?php $form = ActiveForm::begin([
                    'action' => ['/cuenta/updatea', 'id' => $model->idanuncio],
                    'id' => 'login-form',
                    'method' => 'get'
                    /*'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                    ],*/
                ]); ?>

                <div class="">
                    <span style="font-weight: 600; color: #fda4b5; margin-left: 0">Precio original: </span><br>
                    <?= Html::input('text', 'precio', $model->precio, ['class' => 'form-control']) ?>
                    <span style="font-weight: 600; color: #fda4b5; margin-left: 0">Precio oferta: </span> <br>
                    <?= Html::input('text', 'precio_promocion', $model->precio_promocion, ['class' => 'form-control']) ?>
                    <br>
                </div>
                <div align="center">
                    <button type="submit" class="btn btn-default btnregister enviarsns">Cambiar precio</button>
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