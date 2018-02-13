<?php

use app\assets_b\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$script = <<<CSS
.krajee-default.file-preview-frame .kv-file-content {
    width: 100%;
    height: 160px;
}
.file-preview {
    border-radius: 0px;
    border: 0px solid #ddd;
    padding: 0px;
    width: 100%;
    margin-bottom: 5px;
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


CSS;

$this->registerCssFile('@web/assets_b/css/daterangepicker.css', ['depends' => AppAsset::class, 'media' => 'screen', '']);
//$this->registerjsFile('@web/assets_b/web/images/rs-plugin/js/jquery.themepunch.plugins.min.js', ['depends' => AppAsset::class,'position' => \yii\web\View::POS_END]);
//$this->registerjsFile('@web/assets_b/web/images/rs-plugin/js/jquery.themepunch.revolution.min.js', ['depends' => AppAsset::class, 'position' => \yii\web\View::POS_END]);


$this->registerjsFile('@web/assets_b/js/moment.js', ['depends' => AppAsset::class, 'position' => \yii\web\View::POS_END]);
$this->registerjsFile('@web/assets_b/js/daterangepicker.js', ['depends' => AppAsset::class, 'position' => \yii\web\View::POS_END]);


$this->registerCss($script);


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
?>


<div class="">
    <?php $form = ActiveForm::begin([
        'action' => ['cuenta/cuenta'],
        'id' => 'login-form',
        /*'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-4 control-label'],
        ],*/
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class="col-md-4">
        <div class="row">
            <?php
            $initial = [];
            array_push($initial, Html::img('@web/imagen/usuarios/' . $model->foto, ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
            ?>

            <?php
            echo $form->field($model, 'file')->widget(\kartik\widgets\FileInput::classname(), [
                'options' => [
                    'multiple' => false,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
                    'uploadUrl' => \yii\helpers\Url::to(['upload']),
                    'browseLabel' => '',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'uploadExtraData' => [
                        'id' => $model->idusuario,
                    ],
                    'initialPreviewFileType' => 'image',
                    'initialPreview' => $initial,
                    'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                    'language' => 'es-ES'
                ]
            ])->label(false);
            ?>
        </div>


        <div class=" contact-form col-xs-12">

            <?= $form->field($model, 'descripcion')->label(false)->textarea(['rows' => 5, 'class' => '', 'placeholder' => 'Descripcion...']) ?>

        </div>


    </div>


    <div class="col-md-8">
        <div class="menuform">

            <div class="row">
                <div class="col-md-6">
                    <label for="">Nombre completo <span>*</span></label>
                    <?= $form->field($model, 'nombres')->label(false) ?>
                </div>
                <div class="col-md-6">
                    <label for="">Nombre para mostrar <span>*</span></label>
                    <?= $form->field($model, 'alias')->label(false) ?>
                </div>

                <div class="col-md-6">
                    <label for=""> Correo electrónico opcional(opcional)</label>

                    <?= $form->field($model, 'email')->label(false) ?>
                </div>


                <div class="col-md-6">
                    <label for="">Fecha de Nacimiento <span>*</span></label>

                    <?= $form->field($model, 'fecha_nacimiento')->label(false)->textInput(['class' => 'fecha_nacimiento form-control', 'placeholder' => 'Email(requerido)', 'required' => true, 'id' => 'fecha_nacimiento']) ?>
                </div>


                <div class="col-md-6">

                    <label for="">Ciudad donde vive <span>*</span></label>
                    <?= $form->field($model, 'ciudad')->label(false) ?>
                </div>


                <div class="col-md-6">
                    <label for="">Dirección</label>
                    <?= $form->field($model, 'direccion')->label(false) ?>
                </div>


                <div class="col-md-6">
                    <label for="">Telefono o celular <span>*</span></label>
                    <?= $form->field($model, 'telefono')->label(false) ?>
                </div>


            </div>
        </div>

        <div class="menuform">
            <div class="row">

                <div class="col-md-6">
                    <label for="">Intereses</label>
                    <?= $form->field($model, 'intereses')->label(false) ?>
                </div>


                <div class="col-md-6">
                    <label for="">Link de conexión con las redes sociales </label>
                    <?= $form->field($model, 'facebook')->label(false)->textInput(['placeholder' => 'Facebook']) ?>
                    <?= $form->field($model, 'twitter')->label(false)->textInput(['placeholder' => 'Twitter']) ?>
                    <?= $form->field($model, 'youtube')->label(false)->textInput(['placeholder' => 'Youtube']) ?>
                    <?= $form->field($model, 'instagram')->label(false)->textInput(['placeholder' => 'Instagram']) ?>

                </div>


            </div>
        </div>


        <div class="menuform">
            <div class="row">
                <div class="col-xs-12">
                    <p class="datposfac">Datos para facturación <span>(obligatorio y no es público)</span></p>
                </div>

                <div class="col-md-6">
                    <label for="">Nombre</label>
                    <?= $form->field($model, 'nombrenit')->label(false) ?>
                </div>


                <div class="col-md-6">
                    <label for="">NIT</label>
                    <?= $form->field($model, 'nit')->label(false) ?>
                </div>


            </div>
        </div>


        <div class="col-xs-12">
            <?= Html::submitButton('Aplicar cambios', ['class' => 'btnregister btn btn-primary center-block']) ?>
        </div>


    </div>
    <?php ActiveForm::end(); ?>

</div>


<script type="text/javascript">
    $(function () {
        $('input[name="Usuarios[fecha_nacimiento]"]').daterangepicker({

                singleDatePicker: true,
                showDropdowns: true
            },
            function (start, end, label) {
                var years = moment().diff(start, 'years');
                $('#fecha_nacimiento').html(start.format('MMMM-D-YYYY'));

            });
    });
</script>