<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = $model->idanuncio;
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('rechazar', ['denny', 'id' => $model->idanuncio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro?',
            ],
        ]) ?>

        <?= Html::a('Aprobar', ['aprove', 'id' => $model->idanuncio], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Esta seguro?',
            ],
        ]) ?>
    </p>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'idanuncio',
                            'idcategoria',
                            'decripcion:html',
                            'otra_descripcion:html',
                            'codigo',
                            'foto',
                            'precio',
                            'estado',
                            'enable',
                            'fecha_registro',
                        ],
                    ]) ?>

                    <?php
                    foreach ($model->anunciosGalerias as $item) {
                        echo Html::tag('div', Html::img('@web/imagen/anuncios/' . $item['foto'], ['class' => 'img-thumbnail']), ['class' => 'col-md-2 col-sm-4 col-xs-6']);
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

