<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */

$model = new \app\models\Usuarios();


?>

<div class="section-content blog-section with-sidebar">
    <div class="container">
        <h2 class="bold text-center"
            style="font-weight: 600;  font-size: 35px;   margin-bottom: 24px;  margin-top: -5px;"><?= ($model->isNewRecord) ? 'Registrate' : 'Datos de cuenta' ?></h2>
        <div class="blog-box">
            <div class="well">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                    ],
                    //'options'=>['class'=>'col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2']
                ]); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'nombres') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'alias') ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'direccion') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'telefono') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'pais') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'ciudad') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'email') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'movil') ?>
                    </div>

                </div>


                <div class="form-group" align="center">
                    <?= Html::submitButton('Registrar', ['class' => 'vertodos']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>