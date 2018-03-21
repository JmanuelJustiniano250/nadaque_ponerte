<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Html;

?>

<?= Html::beginTag('div', ['class' => "col-md-4 col-sm-6"]) .
Html::beginTag('div', ['class' => "cajadeanuncio"]) .
Html::beginTag('div', ['class' => "imgprove project-gal"]) .
Html::tag('div', EasyThumbnailImage::thumbnailImg(
    Yii::getAlias('@webroot/imagen/anuncios/') . $model['foto'],
    283,
    300,
    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
    ['style' => 'margin: 0 auto;', 'class' => 'img-responsive']
), ['class' => 'post-gal']) .
Html::beginTag('div', ['class' => "cajadesc"]) .
Html::beginTag('div', ['class' => "row"]) .
Html::tag('div',
    Html::tag('h3', $model['titulo'], ['class' => 'text-center']) .
    Html::tag('div',
        Html::tag('p',
            'Código: ' . $model['codigo'],
            ['class' => 'nobor']
        ),
        ['class' => 'col-xs-12 dl2', 'style' => 'padding-right: 0']
    ),
    ['class' => 'list1 cajapro']
) .
Html::tag('div',
    Html::tag('p',
        'Pagado el ' . Html::tag('span', \app\components\Funcions::fecha($model->paquete['fecha_pago'], true, true)),
        ['class' => 'text-center nobor']
    ),
    ['class' => 'list2']
) .
Html::endTag('div') .
Html::endTag('div') .
Html::endTag('div') .
Html::endTag('div') .
Html::endTag('div'); /*?>
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
                                        <h3 class="text-center"> VESTIDO DE MEZCLILLA COLOR AZUL EN TELA JEAN
                                            <!--<? //= $item['titulo'] ?> --></h3>
                                        <div class=" col-xs-12 dl2" style="padding-right: 0">
                                            <p class="nobor">Codigo: 25464 <!--<? //= $item['codigo'] ?>--> </p>
                                        </div>
                                    </div>

                                    <div class="list2">
                                        <p class="text-center nobor">
                                            <br>
                                            Pagado el <span> 25 Nov 2017</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
*/
