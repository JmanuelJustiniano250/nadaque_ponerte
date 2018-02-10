<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contenido */

$this->title = 'Update Contenido: ' . $model->idcontenido;
$this->params['breadcrumbs'][] = ['label' => 'Contenidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcontenido, 'url' => ['view', 'id' => $model->idcontenido]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content-header">

    <h1><?= Html::encode($this->title) ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</section>