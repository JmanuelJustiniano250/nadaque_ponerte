<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Calificaciones
';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


use himiklab\thumbnail\EasyThumbnailImage;
use rmrevin\yii\fontawesome\FA;


?>
<div class="anuncios-create">


    <div class="">


        <div class="row" align="center">

            <div class="col-xs-12 col-sm-8" style="float: initial!important;">
                <div class="cajacomentearios">


                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/') . '0Z84_fSb3cyhEa_bXiWxDvRqxT2MFsjH.png',
                        51,
                        51,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => ' border-radius: 140px; margin: 0 auto; margin-top:20px;', 'class' => 'img-responsive']
                    );
                    ?>


                    <div class="estrellas">
                        <?php

                        use kartik\widgets\StarRating;

                        echo StarRating::widget([
                            'name' => 'rating_21',
                            'value' => 2,
                            'pluginOptions' => [
                                'readonly' => true,
                                'showClear' => false,
                                'showCaption' => false,
                            ],
                        ]); ?>
                    </div>


                    <div class="calificaciones">

                        <h3>Ana Sara Justiniano</h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin non lorem elementum, accumsan
                            magna sed, faucibus mauris. Nulla pellente
                            sque ante nibh, ac hendrerit ante fermentum sed.
                        </p>


                    </div>

                </div>


            </div>

            <br><br>

        </div>


    </div>

</div>
