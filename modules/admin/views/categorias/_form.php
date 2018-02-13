<?php

use kartik\widgets\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-md-6">
            <?= $form->field($model, 'alias')->textInput() ?>

        </div>
    </div>

    <?php //= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
            <?php // Top most parent
            echo $form->field($model, 'idmodulo')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Modulos::findAll(['estado' => '1']), 'idmodulo', 'nombre'),
                'language' => 'es',
                'options' => ['placeholder' => 'Modulos'],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'idpadre')->widget(DepDrop::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Categorias::findAll(['idmodulo' => $model->idmodulo]), 'idcategoria', 'nombre'),
                //'options' => ['placeholder' => 'Categorias'],
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions' => [
                    'depends' => ['categorias-idmodulo'],
                    'placeholder' => 'Categorias',
                    'url' => \yii\helpers\Url::to(['subcat', 'id' => $model->idcategoria])
                ]
            ]) ?>
        </div>
    </div>
    <?php /*= $form->field($model, 'posicion')->textInput() */ ?>

    <?php /*= $form->field($model, 'modulo')->textInput()*/ ?>

    <?php /*= $form->field($model, 'estado')->textInput(['maxlength' => true]) */ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
