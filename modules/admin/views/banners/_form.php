<?php

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$format = <<< SCRIPT
function format(state) {
if (!state.id) return state.text; // optgroup
return state.text;
}
SCRIPT;
$escape = new \yii\web\JsExpression("function(m) { return m; }");
$this->registerJs($format, \yii\web\View::POS_HEAD);
?>

<div class="box-body">
    <?php
    $initial = [];
    array_push($initial, Html::img('@web/imagen/banners/' . $model->foto, ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
    ?>
    <?php $form = ActiveForm::begin([
        //'type' => ActiveForm::TYPE_HORIZONTAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_MEDIUM],
        'options' => ['enctype' => 'multipart/form-data'] // important
    ]); ?>

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
            "language" => "es"
        ]
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'idcategoria')->widget(Select2::classname(), [
                'data' => \app\models\Categorias::getSelectMenu('banners'),
                'language' => 'es',
                'options' => [
                    'placeholder' => 'Categorias',
                    //'multiple' => true,
                ],
                'pluginOptions' => [
                    'templateResult' => new \yii\web\JsExpression('format'),
                    'templateSelection' => new \yii\web\JsExpression('format'),
                    'escapeMarkup' => $escape,
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'descripcion')->textarea() ?></div>
        <div class="col-md-6"><?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?></div>
    </div>


    <!-- <? //= $form->field($model, 'resumen3')->textarea() ?>-->


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
