<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */

$model = new \app\models\Usuarios();




$script = <<<CSS



@media (min-width: 768px)
{
    .well2 {
   width:70%;
}
.dedeq .form-group{ width:50%;}
}

.form-group {
    margin-bottom: 30px;
}

.btnregister{ border: 0px solid; padding:10px 20px}
CSS;


$this->registerCss($script);


?>

<div class="section-content blog-section with-sidebar" align="center">
    <div class="container">
        <h2 class="bold text-center"
            style="font-weight: 600;  font-size: 30px;   margin-bottom: 24px;  margin-top: -5px;"><?= ($model->isNewRecord) ? 'Crear una cuenta' : 'Datos de cuenta' ?></h2>

        <p style="text-align: center; ">Utilize un correo que revises diariamente ya que todas <br> las notificaciones de comentarios, mensajes, compras/ventas, y otros te llegarán al que ingreso acá</p>
        <br> <div class="blog-box">
            <div class="well2" style="padding: 40px 25px; padding-bottom: 5px;">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                    ],
                    //'options'=>['class'=>'col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2']
                ]); ?>
                <div class="row" align="center">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'email')->textInput([ 'placeholder' => 'Correo electronico', 'required' => true])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'nombres')->textInput([ 'placeholder' => 'Nombre Completo', 'required' => true])->label(false) ?>
                    </div>

                </div>





                <div class="form-group" align="center">
                    <?= Html::submitButton('Registrar', ['class' => 'btnregister']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>