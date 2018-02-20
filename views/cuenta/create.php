<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Crear tu anuncio';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anuncios-create">
    <div class="container">

        <h1><?= Html::encode($this->title) ?></h1> <br>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
