<?php

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Promociones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">

    <?php $form = ActiveForm::begin([
        'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_MEDIUM],
    ]); ?>

    <div class="col-md-6">
        <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'nro_usos')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'precio')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'fecha_limite')->widget(
            \kartik\widgets\DatePicker::className(), [
            // modify template for custom rendering
            'language' => 'es',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayBtn' => "linked",
                'keyboardNavigation' => false,
                'forceParse' => false
            ]
        ]); ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'idpaquete')->widget(Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\app\models\Paquetes::find()->where(['estado' => 1])->all(), 'idpaquete', 'nombre'),
            'language' => 'es',
            'options' => [
                'placeholder' => 'Paquete',
                //'multiple' => true,
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
