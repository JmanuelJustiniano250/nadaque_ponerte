<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mensajes */

$this->title = 'Update Mensajes: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmensaje, 'url' => ['view', 'id' => $model->idmensaje]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mensajes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
