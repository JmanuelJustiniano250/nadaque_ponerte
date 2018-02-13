<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">

    <?php $form = ActiveForm::begin([
        'action' => ['create'],
        'type' => ActiveForm::TYPE_INLINE,
        'formConfig' => ['deviceSize' => ActiveForm::SIZE_TINY],
    ]); ?>


    <div class="form-group">
            <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            <?= Html::submitButton(\rmrevin\yii\fontawesome\FA::icon(\rmrevin\yii\fontawesome\FA::_PLUS), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
