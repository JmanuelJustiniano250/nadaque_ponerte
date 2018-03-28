<?php

use app\components\Funcions;
use yii\helpers\Html;
use yii\helpers\Url;

$noticias = \app\models\Noticias::find()
    ->where(['destacado' => '1', 'estado' => '1'])
    ->orderBy(['rand()' => SORT_DESC])
    ->limit(6)
    ->all();

?>

<div class="container no-padding bottom-spacing3">
    <div class="row top-spacing5">

        <h3 class="text-center h3noticdes">POST MÁS RECIENTES</h3>
        <div class="lineaadrono" align="center" style=" margin: 0 auto;  width: 15%;  margin-bottom: -18px;"></div>
        <?= Html::img('@web/assets_b/images/adorno.png', ['class' => 'logo', 'style' => 'margin: 0 auto; display: block; max-width: 100%; padding-bottom: 10px; padding-top: 10px;']) ?>
        <br>

        <?php
        foreach ($noticias as $item):
            $fecha = Funcions::fecha($item['fecha_noticia'])
            ?>

            <div class="col-xs-12 col-md-6 col-lg-4 col-sm-6 no-padding" style="margin-bottom: 15px;">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <?= Html::img('@web/imagen/noticias/' . $item['foto'], ['class' => 'demo2 img-responsive', 'style' => 'margin: 0 auto; display: block;']) ?>
                </div>


                <div class="col-md-7 col-sm-7 col-xs-12">
                    <p class="titlonoti"> <?= \yii\helpers\StringHelper::truncate($item['titulo'], 80) ?> </p>
                    <p class="detallesnoti"><?= $fecha['dia'] ?>/<?= $fecha['mes'] ?>/<?= $fecha['anio'] ?> &nbsp;&nbsp;/
                        <a href="<?= Url::to(['noticia/', 'id' => $item['idnoticia']]) ?>">Leer Más</a></p>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

    <div align="center"><br>
        <a href="<?= Url::to(['noticias']) ?>" class="btnregister regisnoti" style="padding: 10px 20px">VER TODAS LAS ENTRADAS DEL
            BLOG</a>
    </div>
    <br>
</div>
