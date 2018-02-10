<?php

use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contenido */
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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?php /*= $form->field($model, 'idcategoria')->textInput() */ ?>
    <?= $form->field($model, 'idcategoria')->widget(Select2::classname(), [
        'data' => \app\models\Categorias::getSelectMenu('contenido'),
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

    <?= $form->field($model, 'contenido')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'custom',
        'clientOptions' => [
            'extraPlugins' => 'autoembed,embedsemantic,image2,uploadimage,uploadfile',
            'toolbar' => [
                //['name' => 'clipboard','groups' => ['Undo', 'Redo']],
                ['name' => 'clipboard', 'items' => ['Undo', 'Redo']],
                ['name' => 'styles', 'items' => ['Styles', 'Format']],
                ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']],
                ['name' => 'paragraph', 'items' => ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']],
                ['name' => 'links', 'items' => ['Link', 'Unlink']],
                ['name' => 'insert', 'items' => ['Image', 'EmbedSemantic', 'Table']],
                ['name' => 'tools', 'items' => ['Maximize']],
                ['name' => 'editing', 'items' => ['Scayt']],
            ],
            'removeDialogTabs' => 'image:advanced;link:advanced',
            'allowedContent' => true,
        ]
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
