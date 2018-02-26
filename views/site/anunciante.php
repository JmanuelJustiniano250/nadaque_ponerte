<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Html;

$script = <<<CSS
.krajee-default.file-preview-frame .kv-file-content {
    width: 100%;
    height: 160px;
}

.file-zoom-content {
    height: auto;
    text-align: center;
}


.file-preview {
    border-radius: 0px;
    border: 0px solid #ddd;
    padding: 0px;
    width: 100%;
    margin-bottom: 5px;
}

.kv-preview-data.krajee-init-preview.file-preview-image.file-zoom-detail
 {
    width: auto!important;
    height: auto!important;
    
    border-radius: 0!important;
}
.krajee-default.file-preview-frame {
    margin: 0px;
    width: 100%;
    border: 0px solid #ddd;
    box-shadow: 0px 0px 0px 0 #a2958a;
    
    padding: 15px;
     float: initial!important; 
    text-align: center;
    margin: 0 auto;
}


.file-preview-image {
    font: 40px Impact, Charcoal, sans-serif;
    color: #008000;
    width: 160px!important;
    height: 160px!important;
    border-radius: 89px;
}

.krajee-default.file-preview-frame:not(.file-preview-error):hover {
    box-shadow: 0px 0px 0px 0 #333;}
    
    
.file-drop-zone {
    border: 0px dashed #aaa;

}

.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {
    z-index: 2;
    margin-left: -1px;
    position: absolute;
   top: -255px;
    right: 110px;
}

.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle), .input-group-btn:last-child > .btn-group:not(:last-child) > .btn {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    display: none!important;
    
}
.file-preview .fileinput-remove{
display: none!important;
}

.btn-default{
color:#ff839a; border-color: #ff839a;
}

.btn-kv i{
color:#ff839a; border-color: #ff839a;
}
.file-sortable .file-drag-handle {
    cursor: move;
    opacity: 1;
    display: none;
}
.krajee-default .file-footer-buttons {
    float: initial;
    text-align: center;
}
.btn-primary.btn-file {
    color: #fff;
    background-color: #ff839a;
    border-color: #ff839a;
    border-radius: 59px;
    
    padding: 7px 10px;
}

.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group > .btn, .input-group-btn:last-child > .dropdown-toggle, .input-group-btn:first-child > .btn:not(:first-child), .input-group-btn:first-child > .btn-group:not(:first-child) > .btn {
    border-top-left-radius: 59px!important;
    border-bottom-left-radius: 59px!important;
}


@media (min-width: 992px) and (max-width: 1199px)
{
.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {
    z-index: 2;
    margin-left: -1px;
    position: absolute;
   top: -255px;
    right: 80px!important;
}
}


@media (min-width: 768px) and (max-width: 991px)
{
.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {
    z-index: 2;
    margin-left: -1px;
    position: absolute;
   top: -255px;
    right: 285px!important;
}
}



@media (max-width: 410px)
{
.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {
    z-index: 2;
    margin-left: -1px;
    position: absolute;
   top: -255px;
    right: 25px!important;
}
}


label {
    font-family: 'Raleway', sans-serif;
    font-weight: 500;
    color: black;     font-size: 13px;
}


label  span{ 
    color: red;   font-family: 'Helvetica', sans-serif;
}
.contact-form textarea {
    width: 100%;
    display: inline-block;
    padding: 11px;
    background: #ffffff;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -o-border-radius: 0;
    border-radius: 0;
    color: #999999;
    font-size: 13px;
    font-family: 'Raleway', sans-serif;
    border: 1px solid #e5e5e5;
    outline: none;
    margin: 0 0 20px;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
}

.radios .form-group{
display: inline-block;
}
.mi-input::placeholder { color: #b7b7b7;  }

.mi-input { color: black;  }

CSS;


$this->registerCss($script);


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
?>
<?php
$initial = [];
array_push($initial, Html::img('@web/imagen/usuario/' . $model->foto, ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="thumbnail">

                    <H3 style="    font-size: 14px;
    text-align: center; font-weight: 600"> <?= $model['nombres'] ?> (<?= $model['alias'] ?>)</H3>
                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/') . $model['foto'],
                        160,
                        160,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => 'margin: 0 auto;', 'class' => 'img-responsive']
                    );
                    ?>
                    <p class="caption">
                        <?= $model['descripcion'] ?>
                    </p>

                </div>

                <?php
                $query = \app\models\Calificaciones::find()
                    ->where(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
                $valor = ($query->sum('puntaje')/(!empty($query->count())?$query->count():1));
                echo \kartik\rating\StarRating::widget([
                    'name' => 'rating_21',
                    'value' => ($valor/5),
                    'pluginOptions' => [
                        'readonly' => true,
                        'showClear' => false,
                        'showCaption' => false,
                    ],
                ]); ?>

            </div>


        </div>


        <div class="col-md-8">
            <div class="col-xs-12">
                <div class="menuform">

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <p>
                                <strong >Correo electrónico:</strong>
                                <?= $model['email'] ?>
                            </p>

                        </div>

                        <div class="col-md-6 col-xs-12">
                            <p>
                                <strong >Ciudad:</strong>
                                <?= $model['ciudad'] ?>
                            </p>

                        </div>

                        <?php if ($model['visibletelefono']):?>
                            <div class="col-md-6 col-xs-12">
                                <p>
                                    <strong >Ciudad:</strong>
                                    <?= $model['telefono'] ?>
                                </p>

                            </div>
                        <?php endif;?>

                        <div class="col-xs-12">

                            <?php if ($model['visiblefacebook']):?>
                                <p>
                                    <strong >Facebook:</strong>
                                    <?= $model['facebook'] ?>
                                </p>

                            <?php endif;?>
                            <?php if ($model['visibletwittwe']):?>
                                <p>
                                    <strong >Twitter:</strong>
                                    <?= $model['twitter'] ?>
                                </p>

                            <?php endif;?>
                            <?php if ($model['visibleyoutu']):?>
                                <p>
                                    <strong >Youtube:</strong>
                                    <?= $model['youtube'] ?>
                                </p>

                            <?php endif;?>
                            <?php if ($model['visibleinsta']):?>
                                <p>
                                    <strong >Instagram:</strong>
                                    <?= $model['instagram'] ?>
                                </p>

                            <?php endif;?>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

