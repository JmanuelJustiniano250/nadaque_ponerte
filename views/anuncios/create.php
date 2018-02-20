<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Crea tu anuncio';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anuncios-create">
    <div class="container">
        <div class="row">


            <h1 class="text-center" style="font-weight: 600"><?= Html::encode($this->title) ?></h1>
            <p class="text-center">Rellena los campos</p> <br><br>

            <?= $this->render('_form', [
                'filtro' => $filtro,
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
