<?php

use himiklab\thumbnail\EasyThumbnailImage;
use kartik\widgets\StarRating;


/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Calificaciones
';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$meses2 = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$meses = array('', 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
$dia = date("d", strtotime($model['fecha_creacion']));
$mes = date("m", strtotime($model['fecha_creacion']));
$año = date("Y", strtotime($model['fecha_creacion']));




$script = <<<CSS


.item4 h3{
color: black;
}
CSS;
$this->registerCss($script);


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
            'value' => $model['puntaje'],
            'pluginOptions' => [
                'readonly' => true,
                'showClear' => false,
                'showCaption' => false,
            ],
        ]); ?>
        <p style="padding-left: 5px; text-align: center">
            <?= $dia ?>-<?= $mes ?>-<?= $año ?>


        </p>
    </div>


    <div class="calificaciones">

        <h3><?= $model->usuario['alias'] ?></h3>

        <p><?= $model['mensaje'] ?>
        </p>






    </div>

</div>


