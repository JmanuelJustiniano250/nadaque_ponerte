<?php

use kartik\widgets\ActiveForm;
use yii\helpers\Html;

$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);

/* @var $this yii\web\View */
/* @var $model app\models\Anunciantes */
/* @var $form ActiveForm */
?>
<div class="container">
    <h1 class="text-center">Registro de aunciante</h1>
    <?php
    $initial = [];
    array_push($initial, Html::img('@web/imagen/usuario/' . $model->foto, ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
    ?>
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'file')->widget(\kartik\widgets\FileInput::classname(), [
                'options' => [
                    'multiple' => true,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
                    'initialPreviewFileType' => 'image',
                    //'maxFileCount' => 10,
                    'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                    'initialPreview' => $initial,
                    "language" => "es",
                    'browseClass' => 'btn enviarsus',
                ]
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'alias') ?>
            <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'direccion') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ciudad') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'telefono') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'movil') ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Guardar', ['class' => 'btn enviarsus ']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-anunciante -->
