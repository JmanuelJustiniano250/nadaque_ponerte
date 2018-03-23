<?php

use himiklab\thumbnail\EasyThumbnailImage;
use kartik\widgets\StarRating;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$script = <<<CSS
.krajee-default.file-preview-frame .kv-file-content {
    width: 100%;
    height: 160px;
}


.statistic-box.style2{
background: #ffafbe;
}



.blog-section.with-sidebar {
    padding: 10px 0;
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

.redespergil {
    padding-left: 0;
    padding-top: 15px;
    float: initial;
    text-align: center;
    list-style: none;
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
.nav-tabs li {
float: initial!important;
display: inline-block;
}


.nav-tabs li a {
   color: #ff6d89;
    background: transparent;
  
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    background: #ff6d89 !important;
   
}
.nav-tabs li a h2 {
    color: #ff6d89;
}
.nav-tabs li.active a h2 {
    color: white;
}
.nav-tabs li a {
   color: #ff6d89;
    background: transparent;
  
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

.rating-container .caption .label {

    display: none;
}

.rating-container .clear-rating {
  display: none;
}

.rating-md {
  
    display: inline-block;
}

.calsiw{
display: inline-block;
    padding-left: 15px;
    color: #ff6d89;
    font-size: 17px;
        font-family: 'Raleway', sans-serif;
}
.calsiw:hover, .calsiw:focus, .calsiw:active{
text-decoration: none;
  color: #ff6d89;

}


.dedasdw{
background: #ff839a;
    color: white;
    padding: 5px;
    border-radius: 51px;
}



.modal-header.sns {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
    background: #ff6d89;
    color: white;
}



button.close.sns2 {
    -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: white;
    border-radius: 65px;
    padding: 0px 4px;
    border: 0px solid;
}

.close.sns2 {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #a2a2a2;
    text-shadow: 0 0px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 1;
}

.btnregister.enviarsns{
background-color: #000000;
    padding: 5px 20px;
    border-color: #000;
}

.modal-footer.sns3{
border-top: 1px solid transparent;
}

.redespergil {
    padding-left: 10px;
    padding-top: 0px;
    float: inherit;
    list-style: none;
    display: inline-block;
    margin-bottom: 25px;
}
CSS;


$this->registerCss($script);


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
?>
<?php
$initial = [];
array_push($initial, Html::img('@web/imagen/usuario/' . $model->foto, ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
?>

<?= $this->render('../site/widgets/perfilus2'); ?>
<div class="section-content blog-section with-sidebar">


    <div class="shortcodes-elem">
        <!-- Nav tabs -->
        <div class="statistic-box style2">


            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">


                    </div>


                    <div class="col-sm-4 col-xs-12">

                        <?=
                        EasyThumbnailImage::thumbnailImg(
                            Yii::getAlias('@webroot/imagen/usuarios/') . $model['foto'],
                            205,
                            205,
                            EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                            ['style' => ' border-radius: 140px; margin: 0 auto;', 'class' => 'img-responsive']
                        );
                        ?>


                    </div>


                    <div class="col-sm-4 col-xs-12">

                    </div>


                </div>
            </div>


        </div>


        <div class="submenuper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12 esor">


                        <?php
                        $query = \app\models\Calificaciones::find()
                            ->where(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
                        $valor = ($query->sum('puntaje') / (!empty($query->count()) ? $query->count() : 1));
                        echo StarRating::widget([
                            'name' => 'rating_21',
                            'value' => ($valor),
                            'pluginOptions' => [
                                'readonly' => true,
                                'showClear' => false,
                                'showCaption' => false,
                            ],
                        ]); ?>
                        <?php
                        $us = '';
                        if (isset(Yii::$app->session->get('user')['idusuario']))
                            $us = Yii::$app->session->get('user')['idusuario'];
                        if ($model->idusuario != $us):
                            ?>

                            <a href="" data-toggle="modal" class="calsiw" data-target="#califModal">
                                ¡Calificame!
                            </a>


                            <div style="border-bottom: 0px solid white;    margin: 0px 30px ">

                                <!-- line modal -->
                                <div class="modal fade" id="califModal" tabindex="-1" role="dialog"
                                     aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">×</span><span
                                                            class="sr-only">Close</span></button>
                                                <h3 class="modal-title" id="lineModalLabel">Calificame</h3>
                                            </div>
                                            <div class="modal-body">

                                                <!-- content goes here -->
                                                <?php // Usage with ActiveForm and model
                                                $modelcal = new \app\models\Calificaciones();
                                                $modelcal->idvendedor = $model->idusuario;

                                                ?>
                                                <?php $form = ActiveForm::begin([
                                                    'action' => ['/cuenta/calificar'],
                                                    'id' => 'login-form',
                                                    /*'layout' => 'horizontal',
                                                    'fieldConfig' => [
                                                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                                                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                                                    ],*/
                                                ]); ?>
                                                <?= $form->field($modelcal, 'puntaje')->label(false)->widget(\kartik\widgets\StarRating::classname()); ?>
                                                <?= $form->field($modelcal, 'mensaje')->textarea(['class' => 'form-control', 'placeholder' => 'Escribe un comentario acerca de mi', 'style' => "width: 100%", 'rows' => "5"])->label(false) ?>
                                                <?= $form->field($modelcal, 'idvendedor')->hiddenInput()->label(false) ?>

                                                <button type="submit" class="btn btn-default btnregister"
                                                        style="color: white">Calificar
                                                </button>

                                                <?php ActiveForm::end(); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <div class="btn-group btn-group-justified" role="group"
                                                     aria-label="group button">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <p class="nomcom">

                            <?php echo $model['alias'] ?>
                        </p>
                    </div>


                    <div class="col-sm-4 col-xs-12 sendensw" style="margin-top: 5px;">
                        <a href="" data-toggle="modal" data-target="#squarespaceModal" style="margin-top: 20px;">
                            <i class="fa fa-envelope dedasdw" aria-hidden="true"></i><span class="calsiw"
                                                                                           style="font-size: 15px;"> Enviar mensaje</span>

                        </a>


                    </div>


                    <div class="imgquiero">


                        <!-- Modal del enviar mensaje -->

                        <!-- line modal -->
                        <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog"
                             aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header sns">
                                        <button type="button" class="close sns2" data-dismiss="modal"><span
                                                    aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                        <h3 class="modal-title" id="lineModalLabel"
                                            style=" font-size: 16px; font-weight: 600; color: white">

                                            Envia un mensaje a <?= $model['alias'] ?>
                                        </h3>
                                    </div>
                                    <div class="modal-body">

                                        <p style="color: #6b6b6b;">
                                            Comunicate de la forma que mas te convenga con la vendedora
                                        </p>


                                        <p style="margin-top: 15px; margin-bottom: 5px;"><span
                                                    style="font-weight: 600; color: #fda4b5">Número de telefono : </span>


                                            <?php if ($model['telefono']): ?>
                                                <?php if ($model['visibletelefono']): ?>

                                                    <?= $model['telefono'] ?>

                                                <?php else: ?>
                                                    <strong>No disponible</strong>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </p>


                                        <span style="font-weight: 600; color: #fda4b5">Redes Sociales: </span>
                                        <ul class="redespergil">
                                            <?php if ($model['facebook']): ?>
                                                <?php if ($model['visiblefacebook']): ?>
                                                    <li>
                                                        <a href="<?= $model['facebook'] ?>" target="_blank"><i
                                                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    </li>
                                                <?php else: ?>

                                                <?php endif; ?>
                                            <?php endif; ?>





                                            <?php if ($model['twitter']): ?>
                                                <?php if ($model['visibletwittwe']): ?>
                                                    <li>
                                                        <a href="<?= $model['twitter'] ?>" target="_blank"><i
                                                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    </li>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            <?php endif; ?>



                                            <?php if ($model['youtube']): ?>

                                                <?php if ($model['visibleyoutu']): ?>
                                                    <li>
                                                        <a href="<?= $model->usuario['youtube'] ?>" target="_blank"><i
                                                                    class="fa fa-youtube" aria-hidden="true"></i></a>
                                                    </li>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            <?php endif; ?>



                                            <?php if ($model['instagram']): ?>

                                                <?php if ($model['visibleinsta']): ?>

                                                    <li>
                                                        <a href="<?= $model - ['instagram'] ?>" target="_blank"><i
                                                                    class="fa fa-instagram"
                                                                    aria-hidden="true"></i></a>
                                                    </li>
                                                <?php else: ?>

                                                <?php endif; ?>

                                            <?php endif; ?>
                                            <br>
                                        </ul>


                                        <br>
                                        <p style="color: #6b6b6b;">
                                            o también mandale un mensaje privado <br> la respuesta aparecera en tus
                                            mensajes privados.
                                        </p>


                                        <!-- content goes here -->


                                        <?php $form = ActiveForm::begin([
                                            'action' => ['/cuenta/mensaje'],
                                            'id' => 'login-form',
                                            /*'layout' => 'horizontal',
                                            'fieldConfig' => [
                                                'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                                                'labelOptions' => ['class' => 'col-md-4 control-label'],
                                            ],*/
                                        ]); ?>


                                        <?php $modmess = new \app\models\Mensajes(); ?>
                                        <?php $modmess->idvendedor = $model->idusuario; ?>
                                        <?php $modmess->tipo = 0; ?>



                                        <?= $form->field($modmess, 'detalle')->textarea(['class' => 'form-control privatemen', 'placeholder' => 'Escribe el mensaje y el nombre de la prenda', 'style' => "width: 100%", 'rows' => "5"])->label(false) ?>
                                        <?= $form->field($modmess, 'idvendedor')->hiddenInput()->label(false) ?>
                                        <?= $form->field($modmess, 'tipo')->hiddenInput()->label(false) ?>

                                        <div align="right">
                                            <button type="submit" class="btn  btnregister enviarsns">Enviar</button>
                                        </div>
                                        <?php ActiveForm::end(); ?>


                                        <br>


                                    </div>
                                    <div class="modal-footer sns3">
                                        <div class="btn-group btn-group-justified " role="group"
                                             aria-label="group button">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>


    </div>


</div>


<div class="container">
    <div class="row">

        <br><br>
        <div class=" col-sm-6 col-xs-12">

            <div class="menuform">

                <p class="caption">
                    <?= $model['descripcion'] ?>
                </p>

            </div>


            <div class="menuform">


                <p>
                    <strong style="    padding-right: 15px;">Correo electrónico:</strong>
                    <?= $model['email'] ?>
                </p>


                <?php if ($model['visibletelefono']): ?>

                    <p>
                        <strong style="    padding-right: 15px;">Número de Celular:</strong>
                        <?= $model['telefono'] ?>
                    </p>


                <?php endif; ?>

                <p>
                    <strong style="    padding-right: 15px;">Ciudad:</strong>
                    <?= $model['ciudad'] ?>
                </p>


                <ul class="redespergil">
                    <?php if ($model['facebook']): ?>

                        <?php if ($model['visiblefacebook']): ?>
                            <li>
                                <a href="<?= $model['facebook'] ?>" target="_blank"><i
                                            class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                        <?php else: ?>
                        <?php endif; ?>
                    <?php endif; ?>





                    <?php if ($model['twitter']): ?>
                        <?php if ($model['visibletwittwe']): ?>
                            <li>
                                <a href="<?= $model['twitter'] ?>" target="_blank"><i
                                            class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                        <?php else: ?>
                        <?php endif; ?>
                    <?php endif; ?>



                    <?php if ($model['youtube']): ?>

                        <?php if ($model['visibleyoutu']): ?>
                            <li>
                                <a href="<?= $model['youtube'] ?>" target="_blank"><i
                                            class="fa fa-youtube" aria-hidden="true"></i></a>
                            </li>
                        <?php else: ?>
                        <?php endif; ?>
                    <?php endif; ?>



                    <?php if ($model['instagram']): ?>

                        <?php if ($model['visibleinsta']): ?>

                            <li>
                                <a href="<?= $model['instagram'] ?>" target="_blank"><i class="fa fa-instagram"
                                                                                        aria-hidden="true"></i></a>
                            </li>
                        <?php else: ?>

                        <?php endif; ?>

                    <?php endif; ?>
                </ul>


            </div>


        </div>


        <div class=" col-sm-6 col-xs-12">


            <?php
            $modelcoent = \app\models\Usuarios::findOne(['idusuario' => $model->idusuario]);


            ?>

            <?php
            $tabla = \app\models\Calificaciones::find()
                ->andWhere(['idvendedor' => $model->idusuario])
                ->orderBy(['fecha_creacion' => SORT_DESC])
                ->all();
            $provider = new \yii\data\ArrayDataProvider([
                'allModels' => $tabla,
                'pagination' => [
                    'pageSize' => 6,
                ],
            ]);
            \yii\widgets\Pjax::begin();

            echo \yii\widgets\ListView::widget([
                'dataProvider' => $provider,

                'itemView' => '../cuenta/calificaciones',
                'summary' => false,
                'itemOptions' => ['class' => 'item4'],

            ]);
            \yii\widgets\Pjax::end();
            ?>


        </div>


    </div>


    <div class="col-xs-12">

        <div class="anuncios-index">


            <div align="center">

                <ul class="nav nav-tabs" id="myTab">
                    <!-- <li class="active">
                         <a href="#trendy" data-toggle="tab">
 
                             <h2>Anuncios Vendidos</h2>
                         </a>
                     </li>-->
                    <li class="active">
                        <a href="#planning" data-toggle="tab">

                            <h2>Anuncios Vigentes</h2>

                        </a>
                    </li>


                </ul>
            </div>

            <div class="tab-content">
                <!--<div class="tab-pane active" id="trendy">

                        <?php
                /*                        $tabla = \app\models\Anuncios::find()
                                            ->andWhere(['estado' => 1])
                                            ->andWhere(['idusuario' => $model->idusuario])
                                            ->distinct()
                                            ->all();
                                        $provider = new \yii\data\ArrayDataProvider([
                                            'allModels' => $tabla,
                                            'pagination' => [
                                                'pageSize' => 9,
                                            ],
                                        ]);
                                        \yii\widgets\Pjax::begin();
                
                                        echo \yii\widgets\ListView::widget([
                                            'dataProvider' => $provider,
                                            'itemView' => '../cuenta/vigentes2',
                                            'summary' => false,
                                            'itemOptions' => ['class' => 'item2'],
                                        ]);
                                        \yii\widgets\Pjax::end();
                                        */ ?>
                    </div>-->


                <div class="tab-pane active" id="planning">

                    <?php
                    $tabla = \app\models\Anuncios::find()
                        ->andWhere(['estado' => 1])
                        ->andWhere(['idusuario' => $model->idusuario])
                        ->orderBy(['idanuncio'=>SORT_DESC])
                        ->distinct()
                        ->all();
                    $provider = new \yii\data\ArrayDataProvider([
                        'allModels' => $tabla,
                        'pagination' => [
                            'pageSize' => 9,
                        ],
                    ]);
                    \yii\widgets\Pjax::begin();

                    echo \yii\widgets\ListView::widget([
                        'dataProvider' => $provider,
                        'itemView' => '../cuenta/vigentes2',
                        'summary' => false,
                        'itemOptions' => ['class' => 'item2'],
                    ]);
                    \yii\widgets\Pjax::end();
                    ?>

                </div>


            </div>


        </div>


    </div>


</div>
</div>

