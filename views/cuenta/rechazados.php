<?php

use himiklab\thumbnail\EasyThumbnailImage;


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
                    Yii::getAlias('@webroot/imagen/anuncios/') . 'anuncio1.jpg',
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

                    <h3 class="text-center"> <?= $model['titulo'] ?> </h3>


                    <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
                        <p class="nobor">Cod: <?= $model['codigo'] ?> </p>

                    </div>

                    <!-- <div class="col-sm-6 col-xs-12 dl2" style="padding-right: 0">
                        <p class="nobor"><span>Cod. Paquete: </span>
                            <? /*= $model['codigo'] */ ?> </p>
                    </div>-->

                </div>

                <div class="list2">


                    <p class="text-center nobor">
                        <?= $model['razon'] ?>
                        <br>

                        Registrado en
                        <span> <?= \app\components\Funcions::fecha($model->paquete['fecha_pago'], true, true) ?></span>


                    </p>

                    <div class="text-center" align="center" style="margin-top: px;">
                        <?php if ($model->estado == 2): ?>
                            <a href="<?= \yii\helpers\Url::to(['cuenta/create', 'id' => $model->idanuncio]) ?>"
                               class="registrarse" style="margin-left: 0">EDITAR MI ANUNCIO</a>
                        <?php endif; ?>
                    </div>


                </div>


            </div>
        </div>

    </div>

</div>
