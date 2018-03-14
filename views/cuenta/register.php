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


.has-success .help-block, .has-success .control-label, .has-success .radio, .has-success .checkbox, .has-success .radio-inline, .has-success .checkbox-inline, .has-success.radio label, .has-success.checkbox label, .has-success.radio-inline label, .has-success.checkbox-inline label {
    color: black;
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

            <H3 style="    font-size: 14px;
    text-align: center; font-weight: 300">FOTO (sube tu foto de perfil)</H3>

            <?php
            $initial = [];;
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

            <?= $form->field($model, 'descripcion')->label(false)->textarea(['rows' => 5, 'class' => 'mi-input', 'placeholder' => 'Descripcion personal, gustos e intereses en moda, forma de ventas y envio']) ?>

        </div>


    </div>


    <div class="col-md-8">
        <div class="col-xs-12">
            <div class="menuform">

                <div class="row">
                    <div class="col-xs-12">
                        <p>
                            <label for="" style="    font-size: 15px;"> <span>*</span> Campos obligatorios</label>
                        </p>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="">Nombre completo <span>*</span></label>
                        <?= $form->field($model, 'nombres')->label(false) ?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="">Nombre para mostrar en su perfil <span>*</span></label>
                        <?= $form->field($model, 'alias')->label(false) ?>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <label for=""> Correo electrónico (opcional)</label>

                        <?= $form->field($model, 'email')->label(false) ?>
                    </div>


                    <div class="col-md-6 col-xs-12">
                        <div class="col-xs-12" style="padding-left: 0; padding-right: 0"><label for="">Fecha de
                                Nacimiento <span>*</span></label></div>

                        <div class="col-md-3 col-xs-12" style="padding-left: 0">
                            <?= $form->field($model, 'dia')->label(false)->dropDownList(
                                [
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                    '8' => '8',
                                    '9' => '9',
                                    '10' => '10',
                                    '11' => '11',
                                    '12' => '12',
                                    '13' => '13',
                                    '14' => '14',
                                    '15' => '15',
                                    '16' => '16',
                                    '17' => '17',
                                    '18' => '18',
                                    '19' => '19',
                                    '20' => '20',
                                    '21' => '21',
                                    '22' => '22',
                                    '23' => '23',
                                    '24' => '24',
                                    '25' => '25',
                                    '26' => '26',
                                    '27' => '27',
                                    '28' => '28',
                                    '29' => '29',
                                    '30' => '30',
                                    '31' => '31',
                                ]
                            ) ?>

                        </div>


                        <div class="col-md-4 col-xs-12" style="padding-left: 0">
                            <?= $form->field($model, 'mes')->label(false)->dropDownList(

                                [
                                    '1' => 'Ene',
                                    '2' => 'Feb',
                                    '3' => 'Mar',
                                    '4' => 'Abr',
                                    '5' => 'May',
                                    '6' => 'Jun',
                                    '7' => 'Jul',
                                    '8' => 'Ago',
                                    '9' => 'Sep',
                                    '10' => 'Oct',
                                    '11' => 'Nov',
                                    '12' => 'Dic',

                                ]
                            ) ?>
                        </div>


                        <div class="col-md-5 col-xs-12" style="padding-left: 0">


                            <?= $form->field($model, 'ano')->label(false)->dropDownList([
                                '2018' => '2018',
                                '2017' => '2017',
                                '2016' => '2016',
                                '2015' => '2015',
                                '2014' => '2014',
                                '2013' => '2013',
                                '2012' => '2012',
                                '2011' => '2011',
                                '2010' => '2010',
                                '2009' => '2009',
                                '2008' => '2008',
                                '2007' => '2007',
                                '2006' => '2006',
                                '2005' => '2005',
                                '2004' => '2004',
                                '2003' => '2003',
                                '2002' => '2002',
                                '2001' => '2001',
                                '2000' => '2000',
                                '1999' => '1999',
                                '1998' => '1998',
                                '1997' => '1997',
                                '1996' => '1996',
                                '1995' => '1995',
                                '1994' => '1994',
                                '1993' => '1993',
                                '1992' => '1992',
                                '1991' => '1991',
                                '1990' => '1990',
                                '1989' => '1989',
                                '1988' => '1988',
                                '1987' => '1987',
                                '1986' => '1986',
                                '1985' => '1985',
                                '1984' => '1984',
                                '1983' => '1983',
                                '1982' => '1982',
                                '1981' => '1981',
                                '1980' => '1980',
                                '1979' => '1979',
                                '1978' => '1978',
                                '1977' => '1977',
                                '1976' => '1976',
                                '1975' => '1975',
                                '1974' => '1974',
                                '1973' => '1973',
                                '1972' => '1972',
                                '1971' => '1971',
                                '1970' => '1970',
                                '1969' => '1969',
                                '1968' => '1968',
                                '1967' => '1967',
                                '1966' => '1966',
                                '1965' => '1965',
                                '1964' => '1964',
                                '1963' => '1963',
                                '1962' => '1962',
                                '1961' => '1961',
                                '1960' => '1960',
                                '1959' => '1959',
                                '1958' => '1958',
                                '1957' => '1957',
                                '1956' => '1956',
                                '1955' => '1955',
                                '1954' => '1954',
                                '1953' => '1953',
                                '1952' => '1952',
                                '1951' => '1951',
                                '1950' => '1950',
                                '1949' => '1949',
                                '1948' => '1948',
                                '1947' => '1947',
                                '1946' => '1946',
                                '1945' => '1945',
                                '1944' => '1944',
                                '1943' => '1943',
                                '1942' => '1942',
                                '1941' => '1941',
                                '1940' => '1940',
                                '1939' => '1939',
                                '1938' => '1938',
                                '1937' => '1937',
                                '1936' => '1936',
                                '1935' => '1935',
                                '1934' => '1934',
                                '1933' => '1933',
                                '1932' => '1932',
                                '1931' => '1931',
                                '1930' => '1930',
                                '1929' => '1929',
                                '1928' => '1928',
                                '1927' => '1927',
                                '1926' => '1926',
                                '1925' => '1925',
                                '1924' => '1924',
                                '1923' => '1923',
                                '1922' => '1922',
                                '1921' => '1921',
                                '1920' => '1920',
                                '1919' => '1919',
                                '1918' => '1918',
                                '1917' => '1917',
                                '1916' => '1916',
                                '1915' => '1915',
                                '1914' => '1914',
                                '1913' => '1913',
                                '1912' => '1912',
                                '1911' => '1911',
                                '1910' => '1910',
                                '1909' => '1909',
                                '1908' => '1908',
                                '1907' => '1907',
                                '1906' => '1906',
                                '1905' => '1905',
                                '1904' => '1904',
                                '1903' => '1903',
                                '1902' => '1902',
                                '1901' => '1901',
                                '1900' => '1900',

                            ])
                            ?>


                        </div>
                    </div>


                    <div class="col-md-6 col-xs-12">

                        <label for="">Ciudad donde vive o la mas cercana<span>*</span></label>


                        <?= $form->field($model, 'ciudad')->label(false)->dropDownList(
                            ['Santa-Cruz' => 'Santa Cruz',
                                'La-Paz' => 'La Paz',
                                'Cochabamba' => 'Cochabamba',
                                'Beni' => 'Beni',
                                'Tarija' => 'Tarija',
                                'Sucre' => 'Sucre',
                                'Pando' => 'Pando',
                                'Oruro' => 'Oruro',
                                'Potosi' => 'Potosi',
                                'El-alto' => 'El Alto',
                                'Montero' => 'Montero',
                                'Warnes' => 'Warnes',
                                'San-ignacio-de-velasco' => 'San Ignacio de Velasco',
                                'Yacuiba' => 'Yacuiba',
                                'Camiri' => 'Camiri',
                                'Uyuni' => 'Uyuni',
                                'Samaipata' => 'Samaipata',
                                'Riberalta' => 'Riberalta',
                                'Quillacollo' => 'Quillacollo',


                            ]
                        ) ?>


                    </div>


                    <div class="col-md-6 col-xs-12">
                        <label for="">Dirección (No sera mostrada)</label>
                        <?= $form->field($model, 'direccion')->label(false) ?>
                    </div>


                    <div class="col-md-6 col-xs-12">
                        <label for="">Telefono o celular <span>*</span></label>
                        <?= $form->field($model, 'telefono')->label(false) ?>


                    </div>
                    <div class="col-md-6 col-xs-12"><br> <label for="" style="margin-bottom: 0; font-size: 11px;">Selecciona
                            una opcion,
                            <br>

                            <?= $form->field($model, 'visibletelefono')->inline()->radioList(['1' => 'Si quiero que mi telefono o celular sea visible en mis anuncios y perfil', '0' => 'No quiero que mi telefono o celular sea visible en mis anuncios y perfil'])->label(false) ?>

                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-5 col-xs-12">
            <div class="menuform">
                <div class="row">
                    <div class="col-xs-12">

                        <label for="" style="font-weight: 300">Indicanos tu talla (no sera publicada)</label> <br>


                        <label for="">Blusas</label>

                        <?= $form->field($model, 'tallasblusas')->label(false)->dropDownList(
                            ['XXS-(0-2-US)' => 'XXS (0-2 US)',
                                'XS-(2-US)' => 'XS (2 US)',
                                'S-(2-4-US)' => 'S (2-4 US)',
                                'M-(6-8-US)' => 'M (6-8 US)',
                                'L-(8-10-US)' => 'L (8-10 US)',
                                'XL-(10-12-US)' => 'XL (10-12 US)',
                                '1XL-(12-14-US)' => '1XL (12-14 US)',
                                '2XL-(14-16-US)' => '2XL (14-16 US)',
                                '3XL-(16-18-US)' => '3XL (16-18 US)',
                                '4XL-(18-20-US)' => '4XL (18-20 US)',
                                '5XL-(20-US)' => '5XL (20 US)',
                            ]
                        ) ?>


                        <label for="">Pantalones</label>

                        <?= $form->field($model, 'tallaspantalones')->label(false)->dropDownList(
                            ['XXS-(0-US)' => 'XXS (0 US)',
                                'XS-(2-US)' => 'XS (2 US)',
                                'S-(4-US)' => 'S (4 US)',
                                'M-(6-US)' => 'M (6 US)',
                                'L-(8-US)' => 'L (8 US)',
                                'XL-(10-US)' => 'XL (10 US)',
                                '1XL-(12-US)' => '1XL (12 US)',
                                '2XL-(14-US)' => '2XL (14 US)',
                                '3XL-(16-US)' => '3XL (16 US)',
                                '4XL-(18-US)' => '4XL (18 US)',
                                '5XL-(20-US)' => '5XL (20 US)',
                            ]
                        ) ?>

                        <label for="">Zapatos</label>

                        <?= $form->field($model, 'tallaszapatos')->label(false)->dropDownList(
                            ['33-BR/5-US/22.8-cm' => '33 BR/ 5 US/ 22.8 cm.',
                                '33-BR/5.5-US/23.1-cm' => '33 BR/ 5.5 US/ 23.1 cm.',
                                '34-BR/6-US/23.5-cm' => '34 BR/ 6 US/ 23.5 cm.',
                                '35-BR/6.5-US/23.8-cm' => '35 BR/ 6.5 US/ 23.8 cm.',
                                '35-BR/7-US/24.1-cm' => '35 BR/ 7 US/ 24.1 cm.',
                                '36-BR/7.5-US/-24.5-cm' => ' 36 BR/ 7.5 US/ 24.5 cm.',
                                '36-BR/8-US/-24.8-cm' => '36 BR/ 8 US/ 24.8 cm.',
                                '37-BR/8.5-US/25.1-cm' => '37 BR/ 8.5 US/ 25.1 cm.',
                                '38-BR/9-US/25.4-cm' => '38 BR/ 9 US/ 25.4 cm.',
                                '39-BR/9.5-US/25.7-cm' => '39 BR/ 9.5 US/ 25.7 cm.',
                                '40-BR/10-US/26-cm' => '40 BR/ 10 US/ 26 cm.',
                                '41-BR/10.5-US/26.7-cm' => '41 BR/ 10.5 US/ 26.7 cm.',
                                '42-BR/11-US/27.3-cm' => '42 BR/ 11 US/ 27.3 cm.',
                            ]
                        ) ?>


                    </div>


                </div>

            </div>
        </div>

        <div class="col-md-7 col-xs-12">

            <div class="menuform">

                <div class="row">

                    <div class="col-xs-12">

                        <label for="" style="font-weight: 300">Link de conexión con las redes sociales </label>


                        <div class="col-sm-4 col-xs-12" style="padding-left: 0">
                            <div class="radios">
                                <label for="" style="margin-bottom: 0; font-size: 11px;">Visible en tu perfil</label>
                                <br>


                                <?= $form->field($model, 'visiblefacebook')->inline()->radioList(['1' => 'Si', '0' => 'No'])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-sm-8 col-xs-12"><br>
                            <?= $form->field($model, 'facebook')->label(false)->textInput(['placeholder' => 'Facebook']) ?>

                        </div>

                    </div>

                    <div class="col-xs-12">

                        <div class="col-sm-4 col-xs-12" style="padding-left: 0">
                            <div class="radios">
                                <label for="" style="margin-bottom: 0; font-size: 11px;">Visible en tu perfil</label>
                                <br>

                                <?= $form->field($model, 'visibletwittwe')->inline()->radioList(['1' => 'Si', '0' => 'No'])->label(false) ?>


                            </div>
                        </div>


                        <div class="col-sm-8 col-xs-12"><br>
                            <?= $form->field($model, 'twitter')->label(false)->textInput(['placeholder' => 'Twitter']) ?>

                        </div>


                    </div>


                    <div class="col-xs-12">

                        <div class="col-sm-4 col-xs-12" style="padding-left: 0">
                            <div class="radios">
                                <label for="" style="margin-bottom: 0; font-size: 11px;">Visible en tu perfil</label>
                                <br>
                                <?= $form->field($model, 'visibleyoutu')->inline()->radioList(['1' => 'Si', '0' => 'No'])->label(false) ?>


                            </div>
                        </div>


                        <div class="col-sm-8 col-xs-12"><br>
                            <?= $form->field($model, 'youtube')->label(false)->textInput(['placeholder' => 'Youtube']) ?>
                        </div>


                    </div>


                    <div class="col-xs-12">

                        <div class="col-sm-4 col-xs-12" style="padding-left: 0">
                            <div class="radios">
                                <label for="" style="margin-bottom: 0; font-size: 11px;">Visible en tu perfil</label>
                                <br>
                                <?= $form->field($model, 'visibleinsta')->inline()->radioList(['1' => 'Si', '0' => 'No'])->label(false) ?>


                            </div>
                        </div>


                        <div class="col-sm-8 col-xs-12"><br>
                            <?= $form->field($model, 'instagram')->label(false)->textInput(['placeholder' => 'Instagram']) ?>
                        </div>


                    </div>


                </div>


            </div>
        </div>


        <div class="col-xs-12">
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

                        <?= $form->field($model, 'nit')->label(false) ?>
                    </div>


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
    /*$(function () {
        $('input[name="Usuarios[fecha_nacimiento]"]').daterangepicker({

                singleDatePicker: true,
                showDropdowns: true
            },
            function (start, end, label) {
                var years = moment().diff(start, 'years');
                $('#fecha_nacimiento').html(start.format('MMMM-D-YYYY'));

            });
    });*/


    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
    contrasena2.setCustomValidity('');
    }


</script>