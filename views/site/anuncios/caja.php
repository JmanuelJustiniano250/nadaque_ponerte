<?php

use himiklab\thumbnail\EasyThumbnailImage;
use rmrevin\yii\fontawesome\FA;

$url = \yii\helpers\Url::to(['site/item', 'id' => $item['idanuncio']])
?>

<div class="cajadeanuncio">
<div class="imgprove project-gal">
    <div class="post-gal">
    <?=
    EasyThumbnailImage::thumbnailImg(
        Yii::getAlias('@webroot/imagen/anuncios/') . $item['foto'],
        283,
        300,
        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
        ['style' => 'margin: 0 auto;', 'class' => 'img-responsive']
    );
    ?>
    <div class="hover-box box2">
        <a href="<?= $url ?>">
            <?= FA::icon(FA::_SEARCH_PLUS) ?>
        </a>
    </div>

    </div>
</div>

<div class="cajadesc">

    <div class="row">
        <div class="list1 cajapro">

            <h3 class="text-center"><?= $item['titulo'] ?></h3>


            <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
            <p>Talla: M</p>
            <p>Marca</p>
            <p>Nuevo con etiqueta

<!--
                <?php/*
                foreach ($item->anunciosFiltros as $filtro) {
                    $filtro->filtro['nombre'];
                }
               */ ?>
-->



            </p>

            </div>



            <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
                <p>Codigo: <?= $item['codigo'] ?></p>

                <?php if ($item['precio_promocion']): ?>
                <p class="colorwqw">Bs.  <?= $item['precio_promocion'] ?>  </p>
                <p class="colorwqw" style="font-size: 11px;
    text-decoration: line-through;
    font-weight: 300;">Bs.<?= $item['precio'] ?></p>
                <?php else: ?>

                    <p class="colorwqw" s>Bs. <?= $item['precio'] ?> </p>

                <?php endif; ?>



            </div>


            <!--<div class=" fl3">
                <p style="    margin-bottom: -5px;  margin-top: 0;"><a href=""><?= FA::icon(FA::_HEART) ?></a></p>
                <p style="    margin-bottom: 0px;   margin-top: 0;"><a href=""><?= FA::icon(FA::_ARROWS_H) ?></a></p>
            </div>-->
        </div>

        <div class="list2">


            <div class="col-xs-12 fl2" align="left" >

                <div class="imgrod">
                <?=
                EasyThumbnailImage::thumbnailImg(
                    Yii::getAlias('@webroot/imagen/usuarios/') . $item->usuario['foto'],
                    51,
                    51,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    ['style' => ' border-radius: 40px', 'class' => 'img-responsive']
                );
                ?>

                </div>
                <div class="imgrod2">
                    <?= $item->usuario['nombres'] ?>
                    </div>

            </div>





            <p class="text-center">

                <br>

            </p>
        </div>


    </div>
</div>

</div>