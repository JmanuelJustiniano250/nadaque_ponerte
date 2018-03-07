<?php

use dosamigos\ckeditor\CKEditor;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$script = <<<CSS


.medioas{
background: #f6f6f6;
    padding: 30px 30px;
    margin-bottom: 20px;
}
@media (min-width: 768px) {
.des .select2-container--krajee {
   width: 50%!important;
}

.file-preview {
  
    width: 50%!important;
       border: 0px solid #ddd;
}
.krajee-default.file-preview-frame {
    margin: 8px;
    border: 1px solid #ddd;
    box-shadow: 1px 1px 5px 0 #a2958a;
    padding: 6px;
     float: initial; 
    text-align: center;
    width: 50%;
}

.file-caption-main {
    width: 50%;
}

.krajee-default.file-preview-frame .kv-file-content {
    width: auto!important;
    height: 160px;
}

}
@media (max-width: 767px) {
.des .select2-container--krajee {
   width: 100%!important;
}

.file-preview {
  
    width: 100%!important;
       border: 0px solid #ddd;
}

}
.preview-frame .kv-file-content {
    width: auto;
    height: 160px;
}

label {
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    color: #777777;
    font-size: 14px;
    margin-bottom: 10px;
}
.file-preview .fileinput-remove{
display: none;
}

.krajee-default .file-footer-caption {

    margin-bottom: 5px;
}


.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle), .input-group-btn:last-child > .btn-group:not(:last-child) > .btn {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    display: none;
}


.select2-container--krajee .select2-selection {
 
    border-radius: 0px;}

.form-control {
   
    border-radius: 0px;
}

.krajee-default.file-preview-frame {
  
    border: 1px solid #ff6d89!important;
    box-shadow: 0px 0px 0px 0 #a2958a!important;
  
}

.deasq{
background: #ff839a;
}

.btn-default {
    color: #ff839a;
    border-color: #ff839a;
}
.file-sortable .file-drag-handle {
   display: none;
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);








$user = Yii::$app->session->get('user');
?>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    /*'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL
    ] */// important
]); ?>
    <div class="container">
        <div class="row">

            <?php if ($model->isNewRecord): ?>

                <div class="" align="center">
                    <div class="medioas col-xs-12 des" style="">
                        <div class="row">
                            <label for="">Selecciona tu paquete</label>
                            <?php

                            $tmp = array();
                            $tmp_model = \app\models\Compra::find()->where(['paquetes.estado' => 1, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->joinWith(['paquete'])->distinct()->all();
                            foreach ($tmp_model as $item) {
                                $cant = \app\models\Anuncios::find()->where(['idcompra' => $item->idcompra, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->distinct()->count();
                                if ($item->paquete->nro_anuncios > $cant)
                                    $tmp[] = ['id' => $item->idcompra, 'nombre' => $item->paquete->nombre.' ( Anuncios remanentes: '.($item->paquete->nro_anuncios - $cant).')'];
                            }
                            $array = \yii\helpers\ArrayHelper::map(
                                $tmp,
                                'id',
                                'nombre'
                            );
                            echo $form->field($model, 'idcompra')->label(false)->widget(Select2::classname(), [

                                'data' => $array,
                                'language' => 'es',
                                'options' => [
                                    'placeholder' => 'compras',
                                    //'multiple' => true,
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class=" " align="center">
                <div class=" col-xs-12 des" style="">
                    <div class="row">
                        <div class="col-xs-12 des" align="center"><br>
                            <label for="">Foto de tu prenda</label>
                            <?php
                            $initial = [];
                            array_push($initial, Html::img('@web/imagen/anuncios/' . $model->foto, ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
                            ?>
                            <?= $form->field($model, 'file[]')->label(false)->widget(\kartik\widgets\FileInput::classname(), [
                                'options' => [
                                    /*'multiple' => true,*/
                                    'accept' => 'image/*',
                                ],
                                'pluginOptions' => [
                                    'initialPreviewFileType' => 'image',
                                    'initialPreview' => $initial,
                                    'browseLabel' => 'Escoger tu imagen (*.jpg)',
                                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                    'maxFileCount' => 5,
                                    'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                                    "language" => "es",
                                    'browseClass' => 'btn enviarsus',
                                ]
                            ]); ?>

                            <br>
                        </div>

                    </div>
                </div>
            </div>

            <div class="medioas col-xs-12" style="">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nombre de tu prenda</label>
                        <?= $form->field($model, 'titulo')->label(false) ?>
                    </div>

                    <div class="col-md-6 col-xs-12">

                        <label for="">Seleccionar categoría</label>

                        <?php $form->field($model, 'idusuario')->hiddenInput(['value' => $user['idusuario']])->label(false); ?>


                        <?= $form->field($model, 'idcategoria')->label(false)->widget(Select2::classname(), [

                            'data' => \yii\helpers\ArrayHelper::map(\app\models\Categorias::findOne(['alias' => 'anuncios'])->categorias, 'idcategoria', 'nombre'),
                            'language' => 'es',
                            'options' => [
                                'placeholder' => 'Categorias',
                                //'multiple' => true,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                    </div>

                </div>
            </div>


            <div class="medioas col-xs-12" style="">
                <div class="row">
                    <div class="col-xs-12" >
                        <h3 style="    font-size: 16px;
    margin-bottom: 25px;
    font-weight: 600;">Selecciona las categorias de 2do nivel</h3>
                    </div>
                    <div class="col-md-6 col-xs-12">




                        <label for="">Ciudad</label>
                        <?= $form->field($filtro, 'idciudad')->widget(Select2::classname(), [

                            'data' => \yii\helpers\ArrayHelper::map(\app\models\Ciudad::find()->all(), 'idciudad', 'nombre'),
                            'language' => 'es',
                            'options' => [
                                'placeholder' => 'Ciudad',
                                'multiple' => false,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false); ?>



                    </div>

                    <div class="col-md-6 col-xs-12">

                        <label>Colores</label>
                        <?= $form->field($filtro, 'idcolores')->widget(Select2::classname(), [

                            'data' => \yii\helpers\ArrayHelper::map(\app\models\ColoresProductos::find()->all(), 'id_cp', 'nombre'),
                            'language' => 'es',
                            'options' => [
                                'placeholder' => 'Colores',
                                'multiple' => false,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false); ?>


                    </div>



                    <div class="col-md-6 col-xs-12">
                        <label>Condicion</label>
                        <?= $form->field($filtro, 'idcondicion')->widget(Select2::classname(), [

                            'data' => \yii\helpers\ArrayHelper::map(\app\models\CondicionProducto::find()->all(), 'id_cp', 'nombre'),
                            'language' => 'es',
                            'options' => [
                                'placeholder' => 'Condicion',
                                'multiple' => false,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false); ?>
                    </div>



                    <div class="col-md-6 col-xs-12">
                        <label>Marca</label>
                        <?= $form->field($filtro, 'idmarca')->widget(Select2::classname(), [

                            'data' => \yii\helpers\ArrayHelper::map(\app\models\MarcaProducto::find()->all(), 'id_msp', 'nombre'),
                            'language' => 'es',
                            'options' => [
                                'placeholder' => 'Marca',
                                'multiple' => false,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false); ?>
                    </div>

                    <div class="col-md-6 col-xs-12">

                        <label>Material</label>
                        <?= $form->field($filtro, 'idmaterial')->widget(Select2::classname(), [

                            'data' => \yii\helpers\ArrayHelper::map(\app\models\MaterialProducto::find()->all(), 'id_mp', 'nombre'),
                            'language' => 'es',
                            'options' => [
                                'placeholder' => 'Material',
                                'multiple' => false,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false); ?>
                    </div>





                    <div class="col-md-6 col-xs-12">
                        <label>Talla</label>
                        <?= $form->field($filtro, 'idtalla')->widget(Select2::classname(), [

                            'data' => \yii\helpers\ArrayHelper::map(\app\models\TallasProducto::find()->all(), 'id_tp', 'nombre'),
                            'language' => 'es',
                            'options' => [
                                'placeholder' => 'Talla',
                                'multiple' => false,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false); ?>


                    </div>

                </div>

            </div>

        </div>



        <div class="row">
            <div class="medioas">

                <div class="row">

                    <div class="col-xs-12" >
                        <h3 style="    font-size: 16px;
    margin-bottom: 25px;
    font-weight: 600;">Haz una descripcion sobre la prenda que quieres anunciar</h3>
                    </div>


                    <div class=" col-md-6 col-xs-12" >

                        <label>Descripcion</label>


                        <?= $form->field($model, 'decripcion')->label(false)->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'basic'
                        ]) ?>

                    </div>


                    <div class=" col-md-6 col-xs-12" >

                        <label>Medidas</label>


                        <?= $form->field($model, 'otra_descripcion')->label(false)->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'basic'
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>





        <div class="row">

            <div class="medioas col-xs-12" style="">
                <div class="row">


                    <div class="col-xs-12" >
                        <h3 style="    font-size: 16px;
    margin-bottom: 25px;
    font-weight: 600;">Precios</h3>
                    </div>




                    <div class="col-md-6">

                        <label>Precio original</label>
                        <?= $form->field($model, 'precio')->label(false) ?>
                    </div>

                    <div class="col-md-6">
                        <label>Precio de oferta</label>
                        <?= $form->field($model, 'precio_promocion')->label(false) ?>
                    </div>



                </div>
            </div>



        </div>




    </div>

    <div class=" text-center">
        <?= Html::submitButton('Anuncio listo, Publicar', ['class' => 'btn enviarsus ']) ?>
    </div>
    <br>
    <br>
<?php ActiveForm::end(); ?>