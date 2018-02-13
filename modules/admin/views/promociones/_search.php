<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PromocionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promociones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpromocion') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'nro_usos') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'fecha_limite') ?>

    <?php // echo $form->field($model, 'fehca_registro') ?>

    <?php // echo $form->field($model, 'idadministrator') ?>

    <?php // echo $form->field($model, 'idpaquete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
