<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$configuracion = \app\models\Configuracion::find()->one();
$this->render('../site/widgets/metatags', ['model' => $configuracion]);
?>
<div class="section-content blog-section with-sidebar">
    <div class="container">
        <div class="blog-box">
            <div class="well">

                <div class="row text-center">
                    <h1>Recuperar Contrase&ntilde;a</h1>
                    <p> Ingrese su correo electronico para realizar la recuperacion de contrase&ntilde;a, recuerde que
                        la
                        informacion
                        proporcionada sera via correo electronico.</p>
                    <br><br>
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-md-4 control-label'],
                        ],
                        'options' => ['class' => 'col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2']
                    ]); ?>

                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Ingrese su correo electronico']) ?>


                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Ingresar', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
