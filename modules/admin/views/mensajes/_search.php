<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MensajesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensajes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idmensaje') ?>

    <?= $form->field($model, 'idusuario') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'detalle') ?>

    <?= $form->field($model, 'fecha_registro') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'idanuncio') ?>

    <?php // echo $form->field($model, 'idvendedor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
