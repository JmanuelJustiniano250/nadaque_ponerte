<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Html;
use yii\helpers\Url;

$script = <<<CSS
.listadesoow{
color: #333333;
}

.cajadeanuncio:hover a.listadesoow, .cajadeanuncio:focus a.listadesoow, .cajadeanuncio:active a.listadesoow {

color: white;
}

.item4 h3 {
    
    text-align: center;
    padding-left: 0px;
}
.item4 {

    padding: 30px 20px;
   
}
CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::className()]);


?>

<div class="">
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
                    <h3 class="text-center"><a
                                href="<?= Url::to(['site/item', 'id' => $model->anuncio['idanuncio']]) ?>"
                                class="listadesoow"><?= $model->anuncio['titulo'] ?></a></h3>
                    <div class=" col-xs-12 dl2" style="padding-right: 0">
                        <p class="nobor">Codigo: <?= $model->anuncio['codigo'] ?> </p>
                    </div>


                    <div class="text-center" align="center" style="margin-top: 0px;"><BR><br>
                        <?= Html::a('QUITAR DE MI LISTA', ['cuenta/listadel', 'id' => $model->iddeseo, 'estado' => 1], [
                            'class' => 'registrarse',
                            'style' => 'margin-left: 0',
                            'data' => [
                                'confirm' => 'Esta seguro?',
                            ],
                        ]) ?>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
