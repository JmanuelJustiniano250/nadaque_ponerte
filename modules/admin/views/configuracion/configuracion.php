<?php

use kartik\widgets\ActiveForm;
use kartik\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */
/* @var $form ActiveForm */
$this->title = 'Datos de configuracion';
?>
<section class="content-header">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">

                    <?php
                    if (Yii::$app->session->hasFlash('config')) {
                        echo Alert::widget([
                            'type' => Alert::TYPE_SUCCESS,
                            'icon' => 'glyphicon glyphicon-ok-sign',
                            'body' => Yii::$app->session->getFlash('config'),
                            'showSeparator' => true,
                            'delay' => 2000
                        ]);
                    } ?>
                </div>


                <div class="box-body ">
                    <?php Pjax::begin(['id' => 'table']); ?>
                    <?php $form = ActiveForm::begin([
                        'type' => ActiveForm::TYPE_HORIZONTAL,
                        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
                    ]); ?>


                    <?= $form->field($model, 'titulo_pagina') ?>
                    <?php //= $form->field($model, 'logo') ?>
                    <?= $form->field($model, 'resumen_pagina')->textarea() ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'direccion') ?>
                    <?= $form->field($model, 'telefono') ?>
                    <?= $form->field($model, 'movil') ?>
                    <?= $form->field($model, 'coordenadas') ?>
                    <?= $form->field($model, 'facebook') ?>
                    <?= $form->field($model, 'twitter') ?>
                    <?= $form->field($model, 'instagram') ?>
                    <?= $form->field($model, 'youtube') ?>


                    <div class="form-group">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div><!-- site-configuracion -->
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</section>