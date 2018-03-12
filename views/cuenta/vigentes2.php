<?php

use himiklab\thumbnail\EasyThumbnailImage;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */


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
                <div class="hover-box box2">
                    <?= Html::a(FA::icon(FA::_SEARCH_PLUS), ['site/item', 'id' => $model['idanuncio']]) ?>
                </div>

            </div>
        </div>

        <div class="cajadesc">

            <div class="row">
                <div class="list1 cajapro">

                    <h3 class="text-center"><?= $model['titulo'] ?></h3>

                    <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
                        <p><?= (isset($item->anunciosFiltros->talla['value'])) ? ('Talla: ' . $model->anunciosFiltros->talla['value']) : '' ?></p>
                        <p><?= (isset($item->anunciosFiltros->marca['nombre'])) ? $model->anunciosFiltros->marca['nombre'] : '' ?></p>
                        <p><?= (isset($item->anunciosFiltros->condicion['nombre'])) ? $model->anunciosFiltros->condicion['nombre'] : '' ?></p>
                    </div>

                    <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
                        <p>Codigo: <?= $model['codigo'] ?></p>

                        <?php if ($model['precio_promocion']): ?>

                            <p class="colorwqw">Bs. <?= $model['precio_promocion'] ?>  </p>
                            <p class="colorwqw" style="font-size: 11px;
    text-decoration: line-through;
    font-weight: 300;">Bs.<?= $model['precio'] ?></p>

                        <?php else: ?>

                            <p class="colorwqw">Bs. <?= $model['precio'] ?> </p>

                        <?php endif; ?>

                    </div>

                    <!--<div class=" fl3">
                <p style="    margin-bottom: -5px;  margin-top: 0;"><a href=""><?= FA::icon(FA::_HEART) ?></a></p>
                <p style="    margin-bottom: 0px;   margin-top: 0;"><a href=""><?= FA::icon(FA::_ARROWS_H) ?></a></p>
            </div>-->
                </div>

                <div class="list2">


                    <div class="col-xs-12 fl2" align="left">

                        <div class="imgrod">

                            <?php if ($model->usuario['foto']) {
                                echo EasyThumbnailImage::thumbnailImg(
                                    Yii::getAlias('@webroot/imagen/usuarios/') . $model->usuario['foto'],
                                    51,
                                    51,
                                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                    ['style' => ' border-radius: 40px', 'class' => 'img-responsive']
                                );
                            } else {
                                echo EasyThumbnailImage::thumbnailImg(
                                    Yii::getAlias('@webroot/imagen/usuarios/') . 'perfil.png',
                                    51,
                                    51,
                                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                    ['style' => ' border-radius: 40px', 'class' => 'img-responsive']
                                );
                            } ?>
                        </div>
                        <div class="imgrod2">
                            <?= $model->usuario['nombres'] ?>
                        </div>


                    </div>

                    <p class="text-center">
                        <br>
                    </p>
                </div>


            </div>
        </div>

    </div>
</div>
