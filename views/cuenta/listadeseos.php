<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;
?>

<div class="col-md-3 col-sm-6">
    <div class="cajadeanuncio">
        <div class="imgprove project-gal">
            <div class="post-gal">
                <?=
                EasyThumbnailImage::thumbnailImg(
                    Yii::getAlias('@webroot/imagen/anuncios/') . $model->anuncio['foto'],
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
                    <h3 class="text-center"><a href="<?= Url::to(['site/item','id'=>$model->anuncio['idanuncio']])?>"><?= $model->anuncio['titulo'] ?></a></h3>
                    <div class=" col-xs-12 dl2" style="padding-right: 0">
                        <p class="nobor">Codigo: <?= $model->anuncio['codigo'] ?> </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
