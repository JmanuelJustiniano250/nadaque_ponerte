<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<div id="" class="container"><br>
    <h1 class="text-center">Carrito</h1> <br><br>

    <div class="row top-spacing4 bottom-spacing3">

        <div id="">
            <?= $this->render('pasos', ['active' => 1]) ?>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <div class="tab-pane active" id="trendy">
                    <h2 class="text-center">Datos de Facturación</h2> <br>

                    <?php $form = ActiveForm::begin(['id' => 'factura', 'options' => ['class' => ''], 'action' => ['carrito/pasos', 'pasos' => '1'], 'method' => 'post']); ?>

                    <div class="col-sm-6">
                        <?= $form->field($model, 'nombre_factura')->textInput(['placeholder' => 'Razon Social:', 'class' => ' form-control'])->label(false) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'nit_factura')->textInput(['placeholder' => 'NIT:', 'class' => ' form-control'])->label(false) ?>
                    </div>

                    <div class="col-sm-4">
                        <br>
                        <a href="<?= Url::to(Yii::$app->request->referrer); ?>" class="btn btn-link" style="    color: #ff6d89;
    font-weight: 600;">
                            <span style="font-size: 1.5em;">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>&nbsp;
                    </span>Volver atras </a>
                    </div>

                    <div class="col-sm-8">
                        <br>
                        <?= Html::submitButton('Siguiente', ['class' => 'btn enviarsus', 'name' => 'contact-button ', 'style' => 'width:50%']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>


                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br>