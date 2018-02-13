<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnunciosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anuncios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idanuncio') ?>

    <?= $form->field($model, 'idcategoria') ?>

    <?= $form->field($model, 'decripcion') ?>

    <?= $form->field($model, 'otra_descripcion') ?>

    <?= $form->field($model, 'codigo') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'idtalla') ?>

    <?php // echo $form->field($model, 'idmarca') ?>

    <?php // echo $form->field($model, 'idmaterial') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'destacado') ?>

    <?php // echo $form->field($model, 'fecha_registro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
