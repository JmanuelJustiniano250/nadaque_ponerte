<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Update Anuncios: ' . $model->idanuncio;
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idanuncio, 'url' => ['view', 'id' => $model->idanuncio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anuncios-update">
    <div class="container">
        <div class="row">


            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'filtro' => $filtro,
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>