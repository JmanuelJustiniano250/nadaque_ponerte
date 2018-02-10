<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Ingresar';
$this->params['breadcrumbs'][] = $this->title;
$script = <<<CSS
.help-block-error
{
display: none;
}
CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);
?>
<div class="container">

    <div class="row top-spacing4 bottom-spacing3 text-center">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <div class="well">
                <h1>INICIAR SESIÓN</h1>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        //'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        //'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?php /*= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) */ ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-10">
                        <?= Html::submitButton('Aceptar', ['class' => 'btn registrarse', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="row">
                    <div class="col-xs-12">
                        <?= Html::a('Olvidaste tu contraseña', ['cuenta/forget'], ['class' => 'btn plomo-1t']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
