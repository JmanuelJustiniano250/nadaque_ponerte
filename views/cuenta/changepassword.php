<?php

use app\assets_b\AppAsset;
use yii\bootstrap\ActiveForm;
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

.field-usuarios-visibletelefono .radio-inline, .checkbox-inline {
    
    display: block; margin-top: 10px;
   
}

.field-usuarios-visibletelefono .radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline {
  
    
     margin-left: 0px;
   
}
  
.radios .form-group{
display: inline-block;
}
.mi-input::placeholder { color: #b7b7b7;  }

.mi-input { color: black;  }

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
    //'action' => ,
        'id' => 'login-form',
        /*'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-4 control-label'],
        ],*/
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>


    <div class="col-xs-12">
        <div class="menuform">

            <div class="row">


                <div class="col-md-6 col-xs-12">
                    <label for="">Contraseña</label>

                    <?= $form->field($model, 'contrasena')->textInput(['class' => 'form-control'])->input('password')->label(false) ?>


                </div>


                <div class="col-md-6 col-xs-12">
                    <label for="">Repetir contraseña</label>

                    <?= $form->field($model, 'contrasena2')->textInput(['class' => 'form-control'])->input('password')->label(false) ?>

                </div>

            </div>
        </div>
    </div>


    <div class="col-xs-12">
        <?= Html::submitButton('Cambiar contraseña', ['class' => 'btnregister btn btn-primary center-block']) ?>
    </div>


</div>
<?php ActiveForm::end(); ?>


<script type="text/javascript">


</script>