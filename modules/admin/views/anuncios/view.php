<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = $model->idanuncio;
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$url = \yii\helpers\Url::to(['anuncios/comentario','id'=>$model->idanuncio]);
$script = <<<JS
function rechazo() {
    opcion = prompt("Razón:","Datos incorrectos");
    form = new FormData;
jQuery.ajax({
    url:'$url',
    data: {'com':opcion,'est':2},
    success:function(data) {
      location.href=document.referrer;
    }
});  
}
JS;
$this->registerJs($script,\yii\web\View::POS_BEGIN);
?>

<section class="content-header">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>

        <?= Html::a('rechazar', '#', [
            'class' => 'btn btn-danger',
            'onClick' => 'rechazo()',
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

