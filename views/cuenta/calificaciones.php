<?php

use himiklab\thumbnail\EasyThumbnailImage;
use kartik\widgets\StarRating;


/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Calificaciones
';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="cajacomentearios">


    <?=
    EasyThumbnailImage::thumbnailImg(
        Yii::getAlias('@webroot/imagen/usuarios/') . $model->usuario['foto'],
        51,
        51,
        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
        ['style' => ' border-radius: 140px; margin: 0 auto; margin-top:20px;', 'class' => 'img-responsive']
    );
    ?>


    <div class="estrellas">
        <?php

        echo StarRating::widget([
            'name' => 'rating_21',
            'value' => $model['puntaje'] / 5,
            'pluginOptions' => [
                'readonly' => true,
                'showClear' => false,
                'showCaption' => false,
            ],
        ]); ?>
    </div>


    <div class="calificaciones">

        <h3><?= $model->usuario['alias'] ?></h3>

        <p><?= $model['mensaje'] ?>
        </p>


    </div>

</div>


