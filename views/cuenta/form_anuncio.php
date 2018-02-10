<?php

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anuncios-form">

    <?= $this->render('../site/anuncios/formulario', ['model' => $model]) ?>
    <?= $this->render('../site/anuncios/galeria', ['galeria' => $model->anunciosGalerias, 'id' => $model->idanuncio, 'model' => (new \app\models\AnunciosGaleria())]) ?>

</div>
